DROP DATABASE IF EXISTS coffeehouse;
CREATE DATABASE IF NOT EXISTS coffeehouse;
use coffeehouse;



-- User (name, login, email, password, allergens info, address)
CREATE TABLE IF NOT EXISTS users(
    id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_login VARCHAR(64) NOT NULL,
    user_email VARCHAR(64) NOT NULL,
    user_password VARCHAR(64) NOT NULL,

    user_address VARCHAR(128)

);




-- -- Allergens to User (connection)
-- CREATE TABLE IF NOT EXISTS allergensToUser(
--     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     id_user INT NULL,
--     id_allergen INT NULL,

--     FOREIGN KEY(id_user) REFERENCES users(id_user),
--     FOREIGN KEY(id_allergen) REFERENCES allergens(id_allergen)
-- );


CREATE TABLE IF NOT EXISTS categories(
    id_category_type INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(32) NOT NULL
);



-- Product (image, description, price, category)

CREATE TABLE IF NOT EXISTS additions(
    id_addition INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_underAdd INT NOT NULL, 
    addition_type ENUM("syrups", "spices", "condiments") NOT NULL
);

-- Allergens 
CREATE TABLE IF NOT EXISTS allergens(
    id_allergen INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    allergen_name VARCHAR(32) NOT NULL
);


CREATE TABLE IF NOT EXISTS products(
    id_product INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_underProduct INT NOT NULL,
    product_name VARCHAR(32) NOT NULL,
    product_image TEXT NOT NULL,
    product_description TEXT NOT NULL,
    product_startPrice decimal(10,2) NOT NULL,
    
    id_category_type INT NOT NULL, -- 1 или 2 (напиток или закуска, и тд, у них есть свои подкатегории)


    FOREIGN KEY(id_category_type) REFERENCES categories(id_category_type)
);

CREATE TABLE IF NOT EXISTS additionToProducts(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_product INT ,
    id_addition INT ,

    FOREIGN KEY(id_product) REFERENCES products(id_product),
    FOREIGN KEY(id_addition) REFERENCES additions(id_addition)
);

CREATE TABLE IF NOT EXISTS syrups(
    id_syrup INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    syrup_name VARCHAR(32) NOT NULL,
    price decimal(10,2)	NOT NULL
);

CREATE TABLE IF NOT EXISTS spices(
    id_spice INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    spice_name VARCHAR(32) NOT NULL,
    price decimal(10,2)	NOT NULL
);


CREATE TABLE IF NOT EXISTS condiments(
    id_condiment INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    condiment_name VARCHAR(32) NOT NULL,
    price decimal(10,2)	NOT NULL
);


CREATE TABLE IF NOT EXISTS beverages( 
    id_underProduct INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_category_type INT NOT NULL DEFAULT 1,
    beverages_category ENUM("brewed coffees", "oleato", "frappuccino" ,"refreshers") NOT NULL, 
    drink_type ENUM("coffee", "cold drinks") NOT NULL, 
    milk_type ENUM("oat", "whole", "skim", "soy", "almond"),
    size ENUM("short", "tall", "grande", "venti") NOT NULL DEFAULT "tall"

    -- FOREIGN KEY (id_underProduct, id_category_type) REFERENCES products(id_underProduct, id_category_type)
);


CREATE TABLE IF NOT EXISTS food( 
    id_underProduct INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_category_type INT NOT NULL DEFAULT 2,
    amount INT DEFAULT 1, 
    taste ENUM("salty", "sweet", "savory")
    -- taste ENUM("salty", "sweet", "sour", "savory","spicy", "umami")

    -- FOREIGN KEY (id_underProduct, id_category_type) REFERENCES products(id_underProduct, id_category_type)
);


-- 
CREATE TABLE IF NOT EXISTS allergensToProduct(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_product INT ,
    id_allergen INT ,

    FOREIGN KEY(id_product) REFERENCES products(id_product),
    FOREIGN KEY(id_allergen) REFERENCES allergens(id_allergen)
);



-- Order (products, total price)

CREATE TABLE IF NOT EXISTS orders(
    id_order INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    orderDate DATETIME NOT NULL DEFAULT NOW(),
    comments VARCHAR(128),
    total_price decimal(10,2) NOT NULL,
    id_user INT NOT NULL,

    FOREIGN KEY(id_user) REFERENCES users(id_user)
);

CREATE TABLE IF NOT EXISTS orderDetails(
    id_order INT NOT NULL,
    id_underProduct INT NOT NULL,

    productsAmount INT NOT NULL,
    priceEach decimal(10,2)	 NOT NULL,

    PRIMARY KEY (id_order, id_underProduct),

    FOREIGN KEY(id_order) REFERENCES orders(id_order),
    FOREIGN KEY(id_underProduct) REFERENCES products(id_product)
);


-- Cart (products, total price)

CREATE TABLE IF NOT EXISTS cartDetails(
    id_cartDetails INT NOT NULL,
    id_user INT NOT NULL,
    id_underProduct INT NOT NULL,

    productsAmount INT NOT NULL,
    priceEach decimal(10,2) NOT NULL,

    PRIMARY KEY (id_cartDetails, id_underProduct),

    FOREIGN KEY(id_user) REFERENCES users(id_user),
    FOREIGN KEY(id_underProduct) REFERENCES products(id_product)
);

INSERT INTO categories (category_name) VALUES
("beverages"),
("food");


INSERT INTO syrups (syrup_name, price) VALUES 
("Vanilla", 0.75),
("Caramel", 0.65),
("Chocolate", 0.90),
("Almond", 0.80),
("Coconut", 0.50),
("Mint", 0.45),
("Orange", 0.60);

INSERT INTO spices (spice_name, price) VALUES 
("Cocoa", 0.25),
("Nutmeg", 0.18),
("Ginger", 0.22),
("Cardamom", 0.30),
("Anise", 0.28),
("Salt", 0.20),
("Cinnamon", 0.15);



INSERT INTO condiments (condiment_name, price) VALUES
("Paprika", 1.99),
("Garlic powder", 2.49),
("Himalayan salt", 3.99),
("Black pepper", 1.79),
("Parmesan", 4.99),
("Turmeric", 2.29),
("Cilantro", 1.49),
("Sugar", 1.99),
("Curry", 2.99),
("Truffle oil", 7.99);

INSERT INTO additions (id_underAdd, addition_type) VALUES
( 1, "syrups"), -- 1
( 2, "syrups"), -- 2
( 3, "syrups"), -- 3
( 4, "syrups"), -- 4
( 5, "syrups"), -- 5
( 6, "syrups"), -- 6
( 7, "syrups"), -- 7
--
( 1, "spices"), -- 8
( 2, "spices"), -- 9
( 3, "spices"), -- 10
( 4, "spices"), -- 11
( 5, "spices"), -- 12
( 6, "spices"), -- 13
( 7, "spices"), -- 14

( 1, "condiments"), -- 15
( 2, "condiments"), -- 16
( 3, "condiments"), -- 17
( 4, "condiments"), -- 18
( 5, "condiments"), -- 19
( 6, "condiments"), -- 20
( 7, "condiments"), -- 21
( 8, "condiments"), -- 22
( 9, "condiments"), -- 23
( 10, "condiments"); 



INSERT INTO allergens (allergen_name) VALUES 
("Vanilla"),
("Caramel"),
("Chocolate"),
("Almond"),
("Coconut"),
("Mint"),
("Orange"),
("Cocoa"),
("Nutmeg"),
("Ginger"),
("Cardamom"),
("Anise"),
("Salt"),
("Cinnamon"),
("Paprika"),
("Garlic powder"),
("Himalayan salt"),
("Black pepper"),
("Parmesan"),
("Turmeric"),
("Cilantro"),
("Sugar"),
("Curry"),
("Truffle oil"), -- 24

("oat" ), -- 25
("whole" ), -- 26
("skim" ), -- 27
("soy" ), -- 28
("almond"); 


INSERT INTO beverages (beverages_category, drink_type, milk_type)
VALUES 
    ("oleato", "coffee", "oat"),
    ("oleato", "cold drinks", "whole"),
    ("oleato", "coffee", "oat"),
    ("oleato", "coffee", "oat"),
    ("oleato", "cold drinks", "whole"),
    ("oleato", "cold drinks", "soy"),
    ("oleato", "cold drinks", "almond"),
    ("oleato", "cold drinks", "skim");

INSERT INTO beverages (beverages_category, drink_type, milk_type)
VALUES 
    ("frappuccino", "cold drinks", "almond"),
    ("frappuccino", "cold drinks", "oat"),
    ("frappuccino", "cold drinks", "soy"),
    ("frappuccino", "cold drinks", "whole"),
    ("frappuccino", "cold drinks", "oat"),
    ("frappuccino", "cold drinks", "skim"),
    ("frappuccino", "cold drinks", "almond"),
    ("frappuccino", "cold drinks", "soy"),
    ("frappuccino", "cold drinks", "whole"),
    ("frappuccino", "cold drinks", "skim"),
    ("frappuccino", "cold drinks", "almond"),
    ("frappuccino", "cold drinks", "oat"),
    ("frappuccino", "cold drinks", "soy"),
    ("frappuccino", "cold drinks", "whole"),
    ("frappuccino", "cold drinks", "oat"),
    ("frappuccino", "cold drinks", "skim");

INSERT INTO beverages (beverages_category, drink_type, milk_type)
VALUES 
    ("refreshers", "cold drinks", "whole"),
    ("refreshers", "cold drinks", "oat"),
    ("refreshers", "cold drinks", "skim"),
    ("refreshers", "cold drinks", "soy"),
    ("refreshers", "cold drinks", "whole"),
    ("refreshers", "cold drinks", "oat"),
    ("refreshers", "cold drinks", "skim"),
    ("refreshers", "cold drinks", "almond"),
    ("refreshers", "cold drinks", "skim"),
    ("refreshers", "cold drinks", "oat");

INSERT INTO beverages (beverages_category, drink_type, milk_type)
VALUES 
    ("brewed coffees", "coffee", "whole"),
    ("brewed coffees", "coffee", "skim"),
    ("brewed coffees", "coffee", "almond"),
    ("brewed coffees", "coffee", "oat"),
    ("brewed coffees", "coffee", "soy"),
    ("brewed coffees", "coffee", "whole"),
    ("brewed coffees", "coffee", "skim"),
    ("brewed coffees", "coffee", "almond"),
    ("brewed coffees", "coffee", "oat");




INSERT INTO products (id_underProduct,product_name, product_image, product_description, product_startPrice, id_category_type) VALUES

(1,"Oleato Gingerbread Oat milk Latte", "https://globalassets.starbucks.com/digitalassets/products/bev/OleatoGingerbreadLatte.jpg?impolicy=1by1_tight_288", "Experience the rich flavor of gingerbread combined with the smoothness of oat milk. Oleato™ Gingerbread Oatmilk Latte is a journey into a world of aromas and warmth.", 4.99, 1),
(2,"Oleato Golden Foam Cold Brew", "https://globalassets.starbucks.com/digitalassets/products/bev/Oleato_GoldenFoam_ColdBrew.jpg?impolicy=1by1_tight_288", "Refreshing and bold, the taste of cold brew meets the golden foam in Oleato Golden Foam™ Cold Brew. This drink will give you a burst of energy and the unique flavor of summer.", 5.49, 1),
(3,"Oleato Caffé Latte with Oat milk", "https://globalassets.starbucks.com/digitalassets/products/bev/Oleato_CaffeLatte.jpg?impolicy=1by1_tight_288", "A classic Caffé Latte enhanced with the velvety texture of oat milk. Oleato™ Caffé Latte with Oatmilk is the perfect choice for those who appreciate the traditional taste with a hint of oats.", 4.79, 1),
(4,"Oleato Iced Shaken Espresso with Oat milk and Toffee nut", "https://globalassets.starbucks.com/digitalassets/products/bev/Oleato_ToffeeNut_ShakenEspresso.jpg?impolicy=1by1_tight_288", "The lightness of ice, the intensity of espresso, and the sweetness of toffeenut come together in Oleato™ Iced Shaken Espresso with Oatmilk and Toffeenut—a delightful combination of flavors.", 5.99, 1),
(5,"Iced Chai Tea Latte with Oleato Golden Foam", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20230406_1723_IcedChaiTeaLatte-GoldenFoam-onGray_sRGB-1800.jpg?impolicy=1by1_tight_288", "Experience the perfect blend of spiced chai tea and the rich, golden foam of Oleato. Iced Chai Tea Latte with Oleato Golden Foam™ offers a harmonious balance of spiced tea and velvety froth.", 4.89, 1),
(6,"Iced Matcha Tea Latte with Oleato Golden Foam", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211029_7356_IcedMatchaTeaLatte-GoldenFoam-onGray_sRGB-1800.jpg?impolicy=1by1_tight_288", "Indulge in the vibrant flavors of matcha tea combined with the luxurious touch of Oleato Golden Foam™. Iced Matcha Tea Latte is a refreshing and invigorating choice for matcha enthusiasts.", 5.29, 1),
(7,"Paradise Drink Refreshers Beverage with Oleato Golden Foam", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221014_4603_ParadiseDrink-GoldenFoam-onGray_sRGB-1800.jpg?impolicy=1by1_tight_288", "Transport yourself to a tropical paradise with this Starbucks Refreshers® Beverage featuring Oleato Golden Foam™. Enjoy the delightful fusion of fruity refreshment and the indulgent touch of golden froth.", 5.79, 1),
(8,"Dragon Drink Refreshers Beverage with Oleato Golden Foam", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221014_4538_DragonDrink-GoldenColdFoam-onGray_sRGB-1800.jpg?impolicy=1by1_tight_288", "Unleash the dragon with this Starbucks Refreshers® Beverage, now crowned with Oleato Golden Foam™. Revel in the explosion of tropical flavors complemented by the luscious golden froth.", 6.29, 1),

(9,"Sugar Cookie Almondmilk Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20230612_4665_SugarCookieAlmondmilkFrappuccino.jpg?impolicy=1by1_tight_288", "Baked sugar cookie delight with the smoothness of almond milk in a refreshing Frappuccino.", 4.99, 1),
(10,"Apple Crisp Oatmilk Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20210903_AppleCrispFrapp.jpg?impolicy=1by1_tight_288", "Fresh apple and crisp oat milk combine in a delightful Frappuccino with hints of sweet apple pie.", 5.49, 1),
(11,"Pumpkin Spice Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20220323_PumpkinSpiceCoffeeFrapp.jpg?impolicy=1by1_tight_288", "Embrace the essence of fall with a seasonal blend of rich pumpkin flavor and aromatic spices.", 5.99, 1),
(12,"Caramel Brulée Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20230612_4567-CaramelBruleeFrappuccino-onGreen-MOP_1800.jpg?impolicy=1by1_tight_288", "Tempting caramel meets a smooth milkshake with light notes of caramelized sugar.", 4.79, 1),
(13,"Chestnut Praline Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/ChestnutPralineFrappuccino.jpg?impolicy=1by1_tight_288", "A rich Frappuccino featuring the aroma of chestnuts and the sweetness of pralines.", 5.29, 1),
(14,"Peppermint Mocha Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20230612_4613_PeppermintMochaFrappuccino-onGreen-MOP_1800.jpg?impolicy=1by1_tight_288", "Refreshing and cool Frappuccino with the perfect blend of minty freshness and chocolate richness.", 5.79, 1),
(15,"Peppermint White Chocolate Mocha Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_PeppermintWhiteChocolateMochaFrap.jpg?impolicy=1by1_tight_288", "Enchanting combination of white chocolate, mint, and fragrant milk in a wonderfully refreshing Frappuccino.", 6.29, 1),
(16,"Mocha Cookie Crumble Frappuccino", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_MochaCookieCrumbleFrapp.jpg?impolicy=1by1_tight_288", "Indulge in a unique Frappuccino experience with the rich taste of chocolate, smooth milk, and crunchy cookies.", 5.99, 1),
(17,"Caramel Ribbon Crunch Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_CaramelRibbonCrunchFrappuccino-onGreen-MOP_1800.jpg?impolicy=1by1_tight_288", "A delightful blend of espresso and a variety of delightful flavors in a satisfying Frappuccino.", 6.49, 1),
(18,"Espresso Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_EspressoFrapp.jpg?impolicy=1by1_tight_288", "Enjoy the classic taste of vanilla paired with smooth milk in this comforting Frappuccino.", 5.79, 1),
(19,"Caffè Vanilla Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_CaffeVanillaFrapp.jpg?impolicy=1by1_tight_288", "Caramel lovers delight – a luscious Frappuccino with the perfect blend of caramel and milk", 5.29, 1),
(20,"Caramel Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20220323_CaramelFrapp.jpg?impolicy=1by1_tight_288", "A timeless favorite, the Coffee Frappuccino blends rich coffee flavor with a smooth, icy texture.", 4.99, 1),
(21,"Coffee Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_CoffeeFrapp.jpg?impolicy=1by1_tight_288", "Savor the irresistible combination of chocolate, coffee, and ice in this classic Mocha Frappuccino.", 5.49, 1),
(22,"Mocha Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_MochaFrapp.jpg?impolicy=1by1_tight_288", "Experience the perfect balance of coffee and chocolate chips in a delightful Java Chip Frappuccino.", 5.79, 1),
(23,"Java Chip Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_JavaChipFrapp.jpg?impolicy=1by1_tight_288", "White Chocolate Mocha meets icy perfection in this delightful Frappuccino.", 6.29, 1),
(24,"White Chocolate Mocha Frappuccino Blended Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190528_WhiteChocolateMochaFrapp.jpg?impolicy=1by1_tight_288", "A classic Coffee Frappuccino with a delightful twist, offering a familiar yet exciting flavor.", 4.99, 1),

(25,"Frozen Pineapple Passionfruit Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221216_FrozenPineapplePassionfruitRefresherLemonade.jpg?impolicy=1by1_tight_288", "A tropical delight, the Frozen Pineapple Passionfruit Lemonade Refreshers® Beverage is a refreshing blend of pineapple and passionfruit flavors with a zesty lemonade twist.", 4.95, 1),
(26,"Frozen Strawberry Açaí Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221216_FrozenStrawberryAcaiRefresherLemonade.jpg?impolicy=1by1_tight_288", "Indulge in the Frozen Strawberry Açaí Lemonade Refreshers® Beverage, a delightful concoction featuring the sweet taste of strawberries, açaí berries, and the crispness of lemonade.", 5.25, 1),
(27,"Frozen Mango Dragonfruit Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221216_FrozenMangoDragonfruitRefresherLemonade.jpg?impolicy=1by1_tight_288", "Experience the exotic with the Frozen Mango Dragonfruit Lemonade Refreshers® Beverage, a vibrant mix of mango and dragonfruit flavors, perfectly chilled with lemonade.", 4.75, 1),
(28,"Pineapple Passionfruit Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_PineapplePassionfruitRefreshers.jpg?impolicy=1by1_tight_288", "Sip on the Pineapple Passionfruit Refreshers® Beverage, a tropical fusion that combines the luscious sweetness of pineapple with the exotic notes of passionfruit.", 4.45, 1),
(29,"Pineapple Passionfruit Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_PineapplePassionfruitRefreshersLemonade.jpg?impolicy=1by1_tight_288", "Elevate your refreshment with the Pineapple Passionfruit Lemonade Refreshers® Beverage, a tantalizing blend of pineapple and passionfruit flavors, accentuated by the brightness of lemonade.", 4.75, 1),
(30,"Pink Drink Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20181217_PinkDrink.jpg?impolicy=1by1_tight_288", "The Pink Drink Refreshers® Beverage is a fan favorite, featuring the delightful combination of the Strawberry Açaí Refreshers® Beverage with coconut milk for a creamy and fruity experience.", 5.15, 1),
(31,"Strawberry Açaí Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20181217_StrawberryAcaiRefresher.jpg?impolicy=1by1_tight_288", "Quench your thirst with the Strawberry Açaí Refreshers® Beverage, a berry-packed sensation that marries the flavors of juicy strawberries and açaí berries.", 4.65, 1),
(32,"Strawberry Açaí Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_StrawberryAcaiLemonadeRefreshers.jpg?impolicy=1by1_tight_288", "For a twist of citrus, enjoy the Strawberry Açaí Lemonade Refreshers® Beverage, a perfect blend of sweet strawberries and açaí with the crispness of lemonade.", 4.65, 1),
(33,"Mango Dragonfruit Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20221206_MangoDragonfruitRefreshers.jpg?impolicy=1by1_tight_288", "Immerse yourself in the tropical goodness of the Mango Dragonfruit Refreshers® Beverage, a vibrant and fruity combination that will transport you to paradise.", 5.05, 1),
(34,"Mango Dragonfruit Lemonade Refreshers Beverage", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20211210_MangoDragonfruitLemonadeRefreshers.jpg?impolicy=1by1_tight_288", "Experience the Mango Dragonfruit Lemonade Refreshers® Beverage, a tropical escape featuring the flavors of mango and dragonfruit, harmonized with the bright notes of lemonade.", 4.95, 1),

(35,"Brewed Coffees", "https://globalassets.starbucks.com/digitalassets/products/bev/Veranda_Blend_Hot.jpg?impolicy=1by1_tight_288", "A classic and robust coffee experience with a rich and well-balanced flavor profile.", 2.50, 1),
(36,"Featured Blonde Roast", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_PikePlaceRoast.jpg?impolicy=1by1_tight_288", "Delight in the bright and mellow notes of our blonde roast, offering a smooth and light-bodied coffee.", 3.00, 1),
(37,"Featured Medium Roast Pike Place Roast", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_FeaturedDarkRoast.jpg?impolicy=1by1_tight_288", "Savor the distinct taste of our medium roast, known for its balanced and approachable flavor.", 3.25, 1),
(38,"Featured Dark Roast", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_DecafPikePlaceRoast.jpg?impolicy=1by1_tight_288", "Indulge in the bold and intense flavors of our dark roast, delivering a rich and full-bodied coffee experience.", 3.00, 1),
(39,"Featured Decaf Roast Decaf Pike Place Roast", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_DecafPikePlaceRoast.jpg?impolicy=1by1_tight_288", "Enjoy the same great taste as Pike Place Roast without the caffeine, perfect for those who prefer a decaffeinated option.", 3.50, 1),
(40,"Christmas Blonde Roast Clover Vertica Brewed Coffee", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_BlondeRoast.jpg?impolicy=1by1_tight_288", "Celebrate the season with a festive blonde roast, offering a unique and cheerful flavor in every cup.", 4.00, 1),
(41,"Caffè Misto", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_BlondeRoast.jpg?impolicy=1by1_tight_288", "Experience the harmonious blend of brewed coffee and steamed milk, creating a comforting and creamy beverage.", 3.75, 1),
(42,"Clover Vertica Christmas Blend", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_BlondeRoast.jpg?impolicy=1by1_tight_288", "Immerse yourself in the holiday spirit with this Christmas blend, featuring a perfect balance of festive flavors.", 4.25, 1),
(43,"Reserve Christmas 2023 Clover", "https://globalassets.starbucks.com/digitalassets/products/bev/SBX20190617_BlondeRoast.jpg?impolicy=1by1_tight_288", "Indulge in the exceptional taste of our reserve coffee, specially crafted for the holiday season in 2023.", 4.50, 1);







INSERT INTO additionToProducts(id_product, id_addition) VALUES
(1,  1), (1,   10),
(2,  4), (2,   9),
(3,  2),
(4,  5), (4,   13),
         (5,   11),
         (6,   14),
(7,  7 ), (7,   12),
(8,  6 ), (8,   12),
(9,  1 ), (9,   10),
(10, 2 ),
(11, 3 ), (11,  12),
(12, 4 ), (12,  9),
(13, 5 ), (13,  13),
(14, 6 ), (14,  11),
(15, 7 ), (15,  8),
(16, 1 ), (16,  10),
(17, 2 ), (17,  12),
(18, 3 ), (18,  11),
(19, 4 ), (19,  9),
(20, 5 ), (20,  13),
(21, 6 ), (21,  11),
(22, 7 ), (22,  8),
(23, 1 ), (23,  10),
(24, 2 ), (24,  12),
(25, 1 ), (25,  14),
(26, 2 ), (26,  10),
(27, 3 ), (27,  11),
(28, 5 ), (28,  8),
(29, 6 ), (29,  14),
(30, 7 ), (30,  12),
(31, 1 ), (31,  9),
(32, 2 ), (32,  10),
(33, 4 ), (33,  8),
(34, 5 ), (34,  13),
(35, 1 ), (35,  10),
(36, 2 ), (36,  14),
(37, 4 ), (37,  13),
(38, 7 ), (38,  10),
(39, 2 ), (39,  8),
(40, 1 ), (40,  9),
(41, 4), (41, 11),
(42, 4), (42, 13),
(43, 5), (43, 9);


-- id_underProduct INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     id_category_type INT NOT NULL DEFAULT 2,
--     amount INT DEFAULT 1, 
--     taste ENUM("salty", "sweet", "savory")

INSERT INTO food(taste) VALUES
('salty'), 
('savory'),
('savory'),
('salty'), 
('savory'),
('salty'), 
('savory');

INSERT INTO food(taste) VALUES
('sweet'),
('sweet');

INSERT INTO food (taste) VALUES
('savory'),
('savory'),
('savory'),
('savory');

INSERT INTO food (taste) VALUES
('sweet'),
('sweet'),
('sweet'),
('sweet');


INSERT INTO products (id_underProduct,product_name, product_image, product_description, product_startPrice, id_category_type) VALUES
(1, "Bacon, Sausage & Egg Wrap",                   "https://globalassets.starbucks.com/digitalassets/products/food/SBX20191018_BaconSausageCageFreeEggWrap.jpg?impolicy=1by1_tight_288"    , "Hearty breakfast wrap featuring crispy bacon, savory sausage, and fluffy eggs—a perfect on-the-go start to your day.", 5.99, 2),
(2, "Impossible™ Breakfast Sandwich",              "https://globalassets.starbucks.com/digitalassets/products/food/SBX20200225_ImpossibleBreakfastSandwich.jpg?impolicy=1by1_tight_288"    , "Indulge in a plant-based delight with our Impossible™ Breakfast Sandwich—flavorful and cruelty-free.", 6.49, 2),
(3, "Bacon, Gouda & Egg Sandwich",                 "https://globalassets.starbucks.com/digitalassets/products/food/SBX20210915_BaconGoudaEggSandwich.jpg?impolicy=1by1_tight_288"    , "Elevate your morning with the Bacon, Gouda & Egg Sandwich, a delicious combination of Gouda cheese, crispy bacon, and a fluffy egg.", 5.79, 2),
(4, "Double-Smoked Bacon, Cheddar & Egg Sandwich", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20210915_BaconCheddarEggSandwich.jpg?impolicy=1by1_tight_288"    , "Double the flavor with the Double-Smoked Bacon, Cheddar & Egg Sandwich—smoky bacon, sharp cheddar, and a fluffy egg.", 6.99, 2),
(5, "Turkey Bacon, Cheddar & Egg White Sandwich",  "https://globalassets.starbucks.com/digitalassets/products/food/SBX20170117_ReducedFatTurkeyBaconSandwich.jpg?impolicy=1by1_tight_288"    , "Opt for a lighter choice with the Turkey Bacon, Cheddar & Egg White Sandwich—lean turkey bacon, melted cheddar, and fluffy egg whites.", 5.49, 2),
(6, "Sausage, Cheddar & Egg Sandwich",             "https://globalassets.starbucks.com/digitalassets/products/food/SBX20181120_SausageEggCheddarSandwich.jpg?impolicy=1by1_tight_288"    , "Classic breakfast favorite: Sausage, Cheddar & Egg Sandwich—seasoned sausage, melted cheddar, and a perfectly cooked egg.", 5.69, 2),
(7, "Spinach, Feta & Egg White Wrap",              "https://globalassets.starbucks.com/digitalassets/products/food/SBX20181219_SpinachFetaWrap.jpg?impolicy=1by1_tight_288"    , "Wholesome vegetarian option: Spinach, Feta & Egg White Wrap—fresh spinach, flavorful feta cheese, and fluffy egg whites.", 4.99, 2),
(8, "Plain Bagel", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20190715_PlainBagel.jpg?impolicy=1by1_tight_288", "A classic choice, our Plain Bagel is soft on the inside with a crispy exterior. Perfect with butter, jam, or cream cheese – simple and delicious!", 1.99, 2),
(9, "Everything Bagel", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20190821_EverythingBagel_US.jpg?impolicy=1by1_tight_288", "Embark on a sweet journey with our Everything Bagel. A delightful medley of flavors awaits, as the sweet blend of cinnamon, sugar, and a hint of vanilla covers this bagel. Each bite is a harmonious combination of sweetness and warmth, making it an irresistible choice for your dessert cravings.", 2.49, 2),
(10, "Crispy Grilled Cheese on Sourdough", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20220207_GrilledCheeseOnSourdough_US.jpg?impolicy=1by1_tight_288", "Dive into comfort with melted cheese between golden layers of sourdough—a delightful harmony of flavors and textures.", 4.99, 2),
(11, "Ham & Swiss on Baguette", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20221006_HamSwissOnBaguette.jpg?impolicy=1by1_tight_288", "Elevate your taste buds with premium ham and Swiss cheese nestled in a freshly baked baguette—a satisfying choice for any time of day.", 5.49, 2),
(12, "Turkey, Provolone & Pesto on Ciabatta", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20221006_TurkeyProvolonePestoOnCiabatta.jpg?impolicy=1by1_tight_288", "Bursting with flavors, succulent turkey, melted provolone, and zesty pesto on a soft ciabatta roll—a hearty and flavorful treat.", 6.29, 2),
(13, "Tomato & Mozzarella on Focaccia", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20220207_TomatoMozzarellaFocacciaPanini.jpg?impolicy=1by1_tight_288", "Savor the freshness of juicy tomatoes and creamy mozzarella layered on soft, herbed focaccia—a delightful blend in every bite.", 5.99, 2),
(14, "Madeleines", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20210825_MadeleineCakes.jpg?impolicy=1by1_tight_288", "Delicate and dainty, our Madeleines are bite-sized delights with a soft, spongy texture and a hint of citrus flavor.", 3.49, 2),
(15, "Vanilla Biscotti with Almonds", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20210825_VanillaBiscotti.jpg?impolicy=1by1_tight_288", "Indulge in the classic charm of our Vanilla Biscotti with Almonds - crunchy, twice-baked cookies infused with vanilla and studded with almonds.", 2.99, 2),
(16, "Shortbread Cookies", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20190628_ShortbreadCookies.jpg?impolicy=1by1_tight_288", "Butter, sugar, and a sprinkle of happiness - our Shortbread Cookies crumble in your mouth, leaving behind a rich buttery flavor.", 2.79, 2),
(17, "Rip van Wafels – Honey & Oats", "https://globalassets.starbucks.com/digitalassets/products/food/SBX20190628_RipVanWafels_HoneyOats.jpg?impolicy=1by1_tight_288", "Experience the perfect marriage of honey and oats with our Rip van Wafels - thin, chewy Dutch waffle cookies filled with sweet, gooey caramel-like syrup.", 3.29, 2);

INSERT INTO additionToProducts(id_product, id_addition) VALUES
(44,19),
(45,20),
(46,15),
(47,24),
(48,21),
(49,16),
(50,22),
(51,18),
(52,23),
(53,17),
(54,24),
(55,15),
(56,16),
(57,22),
(58,18),
(59,21),
(60,17);



INSERT INTO allergensToProduct(id_product, id_allergen) VALUES
(1,  1), (1, 10),   (1,  25), 
(2,  4), (2, 9),    (2,  26), 
(3,  2),            (3,  25),
(4,  5), (4, 13),   (4,  25), 
         (5, 11),   (5, 26),  
         (6, 14),   (6, 28),  
(7,  7 ), (7, 12),  (7, 29 ),
(8,  6 ), (8, 12),  (8,  27 ),
(9,  1 ), (9, 10),  (9,  29 ),
(10, 2 ),           (10, 25 ),
(11, 3 ), (11, 12), (11, 28 ),
(12, 4 ), (12, 9),  (12, 26 ),
(13, 5 ), (13, 13), (13, 25 ),
(14, 6 ), (14, 11), (14, 27 ),
(15, 7 ), (15, 8),  (15, 29 ),
(16, 1 ), (16, 10), (16, 28 ),
(17, 2 ), (17, 12), (17, 26 ),
(18, 3 ), (18, 11), (18, 27 ),
(19, 4 ), (19, 9),  (19, 29 ),
(20, 5 ), (20, 13), (20, 25 ),
(21, 6 ), (21, 11), (21, 28 ),
(22, 7 ), (22, 8),  (22, 26 ),
(23, 1 ), (23, 10), (23, 25 ),
(24, 2 ), (24, 12), (24, 27 ),
(25, 1 ), (25, 14), (25, 26 ),
(26, 2 ), (26, 10), (26, 25 ),
(27, 3 ), (27, 11), (27, 27 ),
(28, 5 ), (28, 8),  (28, 28 ),
(29, 6 ), (29, 14), (29, 26 ),
(30, 7 ), (30, 12), (30, 25 ),
(31, 1 ), (31, 9),  (31, 27 ),
(32, 2 ), (32, 10), (32, 29 ),
(33, 4 ), (33, 8),  (33, 27 ),
(34, 5 ), (34, 13), (34, 25 ),
(35, 1 ), (35, 10), (35, 26 ),
(36, 2 ), (36, 14), (36, 27 ),
(37, 4 ), (37, 13), (37, 29 ),
(38, 7 ), (38, 10), (38, 25 ),
(39, 2 ), (39, 8),  (39, 28 ),
(40, 1 ), (40, 9),  (40, 26 ),
(41, 4), (41, 11),  (41, 27), 
(42, 4), (42, 13),  (42, 29), 
(43, 5), (43, 9),   (43, 25), 
(44,19),
(45,20),
(46,15),
(47,24),
(48,21),
(49,16),
(50,22),
(51,18),
(52,23),
(53,17),
(54,24),
(55,15),
(56,16),
(57,22),
(58,18),
(59,21),
(60,17);

