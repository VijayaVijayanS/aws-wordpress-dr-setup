#!/bin/bash
# Production Sync
*/2 * * * * aws s3 sync --delete /var/www/html/wp-content/uploads s3://wordpress-mediaasset-mentor1105
*/2 * * * * aws s3 sync --delete /var/www/html/ s3://wordpress-code-mentor1105

# DR Sync
*/2 * * * * aws s3 sync --delete s3://wordpress-mediaasset-mentor1105 /var/www/html/wp-content/uploads
*/2 * * * * aws s3 sync --delete s3://wordpress-code-mentor1105 /var/www/html/
