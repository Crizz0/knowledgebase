# Change Log
All changes to `Knowledge Base` will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).
  
## [1.1.1] - 2021-08-03

### Added
  
### Changed
-	The `composer.json` file according to new version
-	Changed the use of `sizeof()` to `count()` in `controller/admin_controller.php` and `controller/main_controller.php`
  
### Fixed
-	The undefined index `cat_name` to `category_name` in `controller/admin_controller.php`, line 760
  
### Removed

    
## [1.1.0] - 2021-07-26

### Added
-	A preview function for the `post´ and `edit` modes
-	Inserted an additional column into the `KB_ARTICLES` table to hold the username of the last user who edited an article
-	The logging of editing an article
  
### Changed
-	The `composer.json` file according to new version and update developer
  
### Fixed
-	Wrong order of `public` and `static` specifiers in `event/listener.php` and in `migrations/v10x/release_0_0_1.php`
-	Usage of `$this->user->data['session_ip']` instead of `$this->user->data['user_ip']` which led to an empty string in `controller/main_controller.php`
  
### Removed
-	Unnecessary `use` statement in `migrations/v10x/release_0_0_1.php`
  
