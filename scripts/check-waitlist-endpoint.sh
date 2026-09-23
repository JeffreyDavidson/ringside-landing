#!/usr/bin/env bash

set -euo pipefail

port=18743
base_url="http://127.0.0.1:${port}"
log_file="${TMPDIR:-/tmp}/ringside-waitlist-endpoint-test.log"

php -S "127.0.0.1:${port}" -t public >"$log_file" 2>&1 &
server_pid=$!
trap 'kill "$server_pid" 2>/dev/null || true' EXIT

for attempt in {1..20}; do
    if curl --silent --output /dev/null "$base_url/robots.txt"; then
        break
    fi

    if [[ "$attempt" == 20 ]]; then
        cat "$log_file"
        exit 1
    fi

    sleep 1
done

assert_status() {
    local expected_status="$1"
    shift

    local actual_status
    actual_status="$(curl --silent --output /dev/null --write-out '%{http_code}' "$@")"

    if [[ "$actual_status" != "$expected_status" ]]; then
        printf 'Expected HTTP %s, received %s.\n' "$expected_status" "$actual_status" >&2
        exit 1
    fi
}

assert_status 204 --request OPTIONS "$base_url/api/waitlist.php"
assert_status 405 --request GET "$base_url/api/waitlist.php"
assert_status 400 --request POST --header 'Content-Type: application/json' --data '{"email":"invalid","product":"ringside"}' "$base_url/api/waitlist.php"
assert_status 400 --request POST --header 'Content-Type: application/json' --data '{"email":"person@example.invalid","product":"ringside","website":[]}' "$base_url/api/waitlist.php"
assert_status 200 --request POST --header 'Content-Type: application/json' --data '{"email":"bot@example.invalid","product":"ringside","website":"filled"}' "$base_url/api/waitlist.php"

printf 'Waitlist endpoint checks passed.\n'
