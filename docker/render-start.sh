#!/usr/bin/env sh

set -eu

PORT="${PORT:-10000}"

if [ -z "${APP_URL:-}" ] && [ -n "${RENDER_EXTERNAL_URL:-}" ]; then
    export APP_URL="${RENDER_EXTERNAL_URL}"
fi

# Render's generated secrets are base64-encoded 256-bit values. Laravel needs
# the explicit prefix so it decodes the value into a valid 32-byte key.
case "${APP_KEY:-}" in
    base64:*) ;;
    ?*) export APP_KEY="base64:${APP_KEY}" ;;
esac

php artisan config:cache
php artisan route:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT}"
