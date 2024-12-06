# Techancy
An open-source platform dedicated to connecting tech talents with job opportunities across the industry

### Author
[Sa Aaron](https://saaaron.github.io/)

### Screenshots
- [Home page](https://i.ibb.co/Byt2JY5/127-0-0-1-8000.png)
- [Login](https://i.ibb.co/SKXJgjF/127-0-0-1-8000-login.png)
- [Sign up](https://i.ibb.co/xDD67PS/127-0-0-1-8000-signup.png)
- [User's Dashboard 0](https://i.ibb.co/djMBJSx/127-0-0-1-8000-d-home.png)
- [User's Dashboard 1](https://i.ibb.co/dMDsZyd/127-0-0-1-8000-d-home-5.png)
- [User's job post](https://i.ibb.co/YQbDYmp/127-0-0-1-8000-d-home-1.png)
- [User's profile View](https://i.ibb.co/0tkD2T1/127-0-0-1-8000-d-home-4.png)
- [User's settings](https://i.ibb.co/8DD4zQ9/127-0-0-1-8000-d-home-2.png)
- [Search job post 0](https://i.ibb.co/zHGCrpn/127-0-0-1-8000-search-s.png)
- [Search job post 1](https://i.ibb.co/pRqMQby/127-0-0-1-8000-search-s-1.png)
- [User's job post](https://i.ibb.co/QdWkcbj/127-0-0-1-8000-d-job-post-o-MWo-L.png)
- [Job post](https://i.ibb.co/4R8fJgd/127-0-0-1-8000-job-post-o-MWo-L.png)
- [Apply job post](https://i.ibb.co/B4vGW5s/127-0-0-1-8000-job-post-o-MWo-L-1.png)
- [Admin panel 0](https://i.ibb.co/SPn1wYw/127-0-0-1-8000-admin.png)
- [Admin panel 1](https://i.ibb.co/k1D0KJP/127-0-0-1-8000-admin-job-posts.png)

### Requirements
HTML 5, CSS, Bootstrap 5, jQuery, Laravel 11 (Livewire & Filament's Components), MySQL

### Credits
- [Croppie.js](https://foliotek.github.io/Croppie/)

### Installation
- Extract the downloaded zip file and move it to your preferred folder
- Create database `techancy` and Import `techancy.sql` into the database (PhpMyAdmin)
- Run `php artisan serve` in the project's terminal and enjoy! :)

### Admin Panel
- URL: 127.0.0.1:8000/admin
- Email: admin@techancy.app
- Password: 12345678

### Note
- Livewire's and Filament's components are used for the project. Do not forget to install if not found and also Node modules (for Bootstrap 5 and co)
- Gmail SMTP is used for mailing email verification, forgot password, change email address (in user's settings), and deletion of account (in user's settings). Do not forget to configure it in `.env` file
- Google Auth is also used for login & Sign up. Do not forget to configure it in `.env` file
- And lastly, the database tables `about_page`, `admins`, `faq_page`, `job_categories`, `job_levels`, `job_payment_days`, `job_types`, `privacy_policy_page`, `terms_of_use_page`, contains important data that are managed from Admin panel (built with Filament's resource). Do not drop/leave empty but changes can be made from the admin panel
