# ecommerce-test
eccomerce basic template, where i include options for better experience

## Technologies Used 
<table>
    <tr>
        <td>
            <a href="https://laravel.com"><img src="https://i.imgur.com/pBNT1yy.png" /></a>
        </td>
        <td>
            <a href="https://vuejs.org/"><img src="https://i.imgur.com/BxQe48y.png" /></a>
        </td>
    </tr>
</table>

--

**Prerequisites**  

Ensure you have the following installed and configured before proceeding:  

- **PHP** (Laravel-compatible version)  
- **Composer** (for PHP dependencies)  
- **Node.js & npm** (for frontend dependencies)  
- **Database** (MySQL, PostgreSQL, etc.) configured  
- **[Mailtrap](https://mailtrap.io/)** account for email testing (optional)  
- **[Stripe](https://stripe.com/)** or **[Shopify](https://www.shopify.com/)** account for payment testing (optional)  

---
## Installation 
Make sure you have environment setup properly.

### 1️⃣ Download the project (or clone using GIT)
### 2️⃣ Copy `.env.example` into `.env` and configure database credentials
### 3️⃣ Navigate to the project's root directory using terminal
### 4️⃣ Run `composer install`
### 5️⃣ Set the encryption key by executing `php artisan key:generate --ansi`
### 6️⃣ Run migrations `php artisan migrate --seed`
### 7️⃣ Run `php artisan storage:link`
### 8️⃣ Start local server by executing `php artisan serve`
### 9️⃣ Run npm run dev in your terminal.
### 🔟 Navigat to backend folder and Run npm run dev.
###   Email need an account, if you have an account in mailtrap you can test it.
###   I use stripe in mode test for checkout, but you can change for shopify.

# Features 🚀
✅ User authentication
✅ Product catalog
✅ Shopping cart
✅ Order processing
✅ Payment gateway integration (Stripe/Shopify)
✅ Email notifications



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

