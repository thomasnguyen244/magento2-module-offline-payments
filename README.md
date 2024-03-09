# Magento 2 Offline Payments
``thomas/module-offline-payments``

Magento 2 Offline Payments

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)

## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 
[![Buy Me A Coffee](https://raw.githubusercontent.com/thomasnguyen244/resume/update-resume-info/assets/buy-me-a-coffee.png)](https://www.buymeacoffee.com/workwiththomas)

## Main Functionalities
- 

## Installation

### Type 1: Zip file

 - Unzip the zip file in `app/code/Thomas`
 - Enable the module by running `php bin/magento module:enable Thomas_OfflinePayments`
 - Apply database updates by running `php bin/magento setup:upgrade --keep-generated`
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require thomas/module-offline-payments`
 - enable the module by running `php bin/magento module:enable Thomas_OfflinePayments`
 - apply database updates by running `php bin/magento setup:upgrade --keep-generated`
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration


## Specifications


## Attributes


## How to work
- 
