use marketplace;

-- SELECT
--     order_product.id_order AS O_ID_ORDER, 
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
-- 	CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT,
-- 	CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
-- 	CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE,
-- 	users.address AS O_ADDR,
-- 	order_product.total_price AS O_TOTAL_PRICE,
-- 	order_product.status AS O_STATUS 
-- FROM order_product 
-- JOIN products ON order_product.id_product = products.id_product 
-- JOIN users ON order_product.id_user = users.id_user 
-- GROUP BY order_product.id_order;

-- SELECT
-- 	order_product.id_order AS O_ID_ORDER, 
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
-- 	CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT,
-- 	CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
-- 	CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, 
-- 	order_product.account_name AS O_ACCOUNT_NAME, 
-- 	order_product.amount AS O_AMOUNT, 
-- 	order_product.tax AS O_TAX, 
-- 	order_product.total_price AS O_TOTAL_PRICE, 
-- 	order_product.status AS O_STATUS 
-- FROM order_product 
-- JOIN products ON order_product.id_product = products.id_product 
-- JOIN users ON order_product.id_user = users.id_user 
-- WHERE order_product.id_order = 'ORD-0423-17-2'
-- GROUP BY order_product.id_order;

-- SELECT 
-- 	users.id_user AS ID,
-- 	users.email AS EMAIL,
-- 	members.name AS MEMBER,
-- 	users.status AS STATUS
-- FROM users 
-- JOIN members
-- ON users.id_member = members.id_member;

-- SELECT 
-- 	DISTINCT(CONCAT(users.firstname, ' ' ,users.lastname)) AS O_FULLNAME,
-- 	users.email AS O_EMAIL,
-- 	order_product.id_order AS O_ID_ORDER,
-- 	order_product.status AS O_STATUS
-- FROM order_product
-- 	JOIN users
-- ON order_product.id_user = users.id_user;

-- SELECT DISTINCT(account_name) FROM order_product;

-- SELECT products.*, categories.name AS categories 
-- FROM products JOIN categories 
-- ON products.id_cat = categories.id_cat 
-- JOIN users ON users.id_user = products.id_user
-- WHERE products.id_cat=categories.id_cat AND users.id_user = 'USR-0406-17-2'
-- ORDER BY products.id_product DESC;

-- DESCRIBE products;

-- SELECT 
-- 	order_product.id_order AS O_ID_ORDER, 
-- 	CONCAT(users.firstname, ' ' ,users.lastname) AS O_FULLNAME, 
-- 	CONVERT(GROUP_CONCAT(products.name SEPARATOR ', ') USING utf8) AS O_PRODUCT, 
-- 	CONVERT(GROUP_CONCAT(order_product.qty SEPARATOR ', ') USING utf8) AS O_QTY, 
-- 	CONVERT(GROUP_CONCAT(order_product.size SEPARATOR ', ') USING utf8) AS O_SIZE, 
-- 	order_product.account_name AS O_ACCOUNT_NAME, 
-- 	order_product.amount AS O_AMOUNT, 
-- 	order_product.tax AS O_TAX, 
-- 	order_product.total_price AS O_TOTAL_PRICE, 
-- 	order_product.status AS O_STATUS, 
-- 	order_product.deleted AS O_DELETED 
-- FROM 
-- 	order_product 
-- JOIN 
-- 	products 
-- ON 
-- 	order_product.id_product = products.id_product 
-- JOIN 
-- 	users 
-- ON 
-- 	order_product.id_user = users.id_user 
-- WHERE 
-- 	users.id_user!='USR-0406-17-2'
-- AND 
-- 	products.id_user='USR-0406-17-2'
-- GROUP BY 
-- 	order_product.id_order;

-- SELECT id_user, username, CONCAT(firstname, ' ' ,lastname) AS fullname, email FROM users WHERE id_member=3;
DESCRIBE users;