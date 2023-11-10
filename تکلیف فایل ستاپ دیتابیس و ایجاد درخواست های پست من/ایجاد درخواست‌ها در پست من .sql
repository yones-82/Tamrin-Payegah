//ویرایش حساب کاربری و محصول


PUT /user/<user_id>
Content-Type: application/json

{
  "name": "new name",
  "email": "new email"
}

PUT /product/<product_id>
Content-Type: application/json

{
  "name": "new product name",
  "price": "new price"
}


//حذف کاربر و محصول


DELETE /user/<user_id>
DELETE /product/<product_id>

//دریافت اطلاعات همه کاربران و محصولات


GET /users
GET /products

//دریافت اطلاعات کاربر شماره ۲ و محصول شماره ۳


GET /user/2
GET /product/3

