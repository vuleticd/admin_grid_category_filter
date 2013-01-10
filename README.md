Magento Admin Product Grid Category Filter
==========================

Magento has complex system for categories, and that is really flexible and usable. It also introduce flexible model for product attributes, and catalog management in general.

For me, it was obvious that with large number of products inside large number of categories, merchants will need quick way to find products assigned only to one category.

For example, you may wish to bulk change some attributes only on products in specific category. Or you may wish to check if you have assigned all desired products to desired category, or not, without leaving the admin product grid page in Magento backend.

This is exactly what “Admin Product Grid Category Filter” module will enable you to achieve. Based on Observers/ Events mechanism in Magento, this extension does not overwrite any core Magento classes. Clean out of all unneeded functionality, this module will just add category column and search filter into manage products grid. The search filter box is drop down with all your categories in tree view, reflecting parent/child relations.

Version:
------------------------

- Stable: version 0.0.0.1

Features:
-------------------------

- Add category column and search filter to Magento admin product grid, enabling merchants to search for products assigned only to selected category.
- Magento observers/events based.
- No core files are rewritten.
- Database is not altered in any way.
- Support for Magento multi stores configuration.
- Module does not have any extra options or configuration.
- Full open source code
- Tested on Magento CE 1.7.0.2

Installation:
-------------------------

1. Clear the store cache under var/cache and all cookies for your store domain. Disable compilation if enabled. This step eliminates almost all potential problems. It’s necessary since Magento uses cache heavily.
2. Backup your store database and web directory.
3. Download and unzip extension contents on your computer and navigate inside the extracted folder.
4. Using your FTP client upload content of ”app” directory to “app” directory inside your store root.

Uninstall:
-------------------------

- You can safely remove the extension files from your store.
