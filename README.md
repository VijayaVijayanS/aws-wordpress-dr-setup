# WordPress High-Availability Deployment on AWS with Disaster Recovery

This project sets up a high-availability WordPress environment on AWS, with both Production and Disaster Recovery (DR) configurations. The infrastructure includes ACM for SSL certificates, Route 53 for DNS management, RDS for database instances, IAM roles, EC2 instances for hosting, ELBs for load balancing, and S3 for backup storage. simple policy is managed using Route 53 and ELB to ensure continuity between Production and DR environments.

## Table of Contents

- [Overview](#over-view)
- [Architecture](#-architecture)
- [Architecture Diagram](#Architecture-Diagram)
- [Setup Steps](#setup--steps)
  - [Step 1: AWS Certificate Manager (ACM)](#step--1-aws-certificate-manager-acm)
  - [Step 2: Route 53 DNS and GoDaddy Integration](#step--2-route-53-dns-and-godaddy-integration)
  - [Step 3: RDS Database Setup](#step-3-rds-database--setup)
  - [Step 4: IAM Role Creation](#step-4-iam-role--creation)
  - [Step 5: EC2 Instance Setup](#step-5-ec2--instance-setup)
  - [Step 6: ELB Configuration](#step-6--elb-configuration)
  - [Step 7: Configure wp-config.php](#step--7-configure-wp-configphp)
  - [Step 8: Launch WordPress Application Pages](#step--8-launch-wordpress-application-pages)
  - [Step 9: Sync Route 53 with ELB](#step-9-sync-route--53-with-elb)
  - [Step 10: S3 Bucket and Backup Crontab Jobs](#step-10--s3-bucket-and-backup-crontab-jobs)
- [Conclusion](#conclusion)



## Overview

The AWS WordPress project aims to provide a scalable and reliable WordPress setup with production and DR environments. Each environment is configured with AWS services for optimal performance, security, and disaster recovery.

## Architecture

1. **ACM** - Public certificates for HTTPS.
2. **Route 53** - Domain and DNS management.
3. **RDS** - Separate databases for Production and DR.
4. **IAM** - Role with permissions for EC2 instances.
5. **EC2** - Separate instances for Production and DR, configured with WordPress.
6. **Classic ELB** - Load balancers for each environment.
7. **S3** - Storage for backup and media assets.

### Architecture Diagram

For a detailed visual representation of the architecture, refer to the CloudCraft diagram: [View Architecture Diagram](https://app.cloudcraft.co/view/a99eb38e-934c-4653-8cc9-e8d7a8a1f942?key=74f5137b-e604-477c-bc2b-c13370ff2133)


## Setup Steps

### Step 1: AWS Certificate Manager (ACM)

1. Go to **ACM** in the AWS Console.
2. **Request a Certificate**:
   - Enter the domain names (e.g., `bluestarfit.shop` and `dr.bluestarfit.shop`).
   - Select **DNS validation**.
3. **Validate Ownership**:
   - Add the CNAME records provided by ACM to your GoDaddy DNS settings.
   - Wait for ACM to validate and issue the certificates.

### Step 2: Route 53 DNS and GoDaddy Integration

1. **Create Hosted Zones**:
   - Create a hosted zone for your primary domain.
2. **Link GoDaddy DNS**:
   - Copy the Name Servers from Route 53 and replace the NS records in GoDaddy.
3. **Create Record Sets**:
   - Add A or CNAME records for `bluestarfit.shop` and `dr.bluestarfit.shop` linked to the ACM certificates.

### Step 3: RDS Database Setup

1. **Create Security and Subnet Groups**:
   - Set up security groups for RDS and configure a subnet group across the VPC.
2. **Launch RDS Instances**:
   - Create RDS instances for Production and DR, assigning security and subnet groups.

### Step 4: IAM Role Creation

1. Go to **IAM** and create a role with EC2 service permissions.
2. Attach `AmazonS3FullAccess` for backup operations.

### Step 5: EC2 Instance Setup

1. **Launch Two EC2 Instances** for Production and DR.
   - Assign the IAM role created in Step 4.
2. **User Data Script**:
   - Add the following script in the EC2 user data section to configure WordPress:

   ```bash
   #!/bin/bash
   yum install httpd php-mysql -y
   amazon-linux-extras install -y php7.3
   cd /var/www/html
   echo "healthy" > healthy.html
   wget https://wordpress.org/latest.tar.gz
   tar -xzf latest.tar.gz
   cp -r wordpress/* /var/www/html/
   rm -rf wordpress
   rm -rf latest.tar.gz
   chmod -R 755 wp-content
   chown -R apache:apache wp-content
   wget https://s3.amazonaws.com/bucketforwordpresslab-donotdelete/htaccess.txt
   mv htaccess.txt .htaccess
   chkconfig httpd on
   service httpd start


### Step 6: ELB Configuration:

  - Create Classic ELBs for Production and DR instances.
Link each ELB to the appropriate EC2 instance.
Assign security groups with required inbound rules.


### Step 7: Configure wp-config.php:
 
 - SSH into both EC2 instances.

 - Navigate to /var/www/html/wp-config.php.

 - Update with the database credentials:
 


### Step 8: Launch WordPress Application Pages:

 - Access Production and DR environments via ELB URLs.
 - Upload Images to each site to visually differentiate environments.

   
### Step 9: Sync Route 53 with ELB:

- Refresh Route 53 and create alias records pointing to each ELB.
#### Simple Routing Policy:
 - Configure routing in Route 53 to ensure simple functionality for DR.

   
### Step 10: S3 Bucket and Backup Crontab Jobs:
### Create Two S3 Buckets:

- wordpress-mediaasset-mentor1105 for media assets.
- wordpress-code-mentor1105 for code backups.
  
### Crontab Backup Jobs:

- SSH into each EC2 instance and add these crontab jobs:
### Production:

*/2 * * * * aws s3 sync --delete /var/www/html/wp-content/uploads s3://wordpress-mediaasset-mentor1105

*/2 * * * * aws s3 sync --delete /var/www/html/ s3://wordpress-code-mentor1105

### Disaster Recovery:

*/2 * * * * aws s3 sync --delete s3://wordpress-mediaasset-mentor1105 /var/www/html/wp-content/uploads

*/2 * * * * aws s3 sync --delete s3://wordpress-code-mentor1105 /var/www/html/


### Final Step: HTTP to HTTPS Redirection for ELBs:

- Configure ELBs to redirect HTTP to HTTPS, ensuring secure access to the application.
### Usage

- Once set up, access your WordPress application via the URLs:

     - Production: https://bluestarfit.shop
     - DR: https://dr.bluestarfit.shop
 
       
### Troubleshooting

- Ensure that all DNS and SSL validations are correctly configured in GoDaddy and ACM.
  
- Verify the S3 sync crontab jobs to ensure backups are working as expected.

### Conclusion

This README provides a clear structure and detailed instructions for setting up and managing the WordPress project on AWS. Let me know if you need additional sections or details!


