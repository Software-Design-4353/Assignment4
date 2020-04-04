CREATE DATEBASE Users
CREATE TABLE UserInfo (
    Email VARCHAR(50) PRIMARY KEY,
    Password VARCHAR(50),
    fName VARCHAR(50),
    lName VARCHAR(50),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(50),
    state VARCHAR(50),
    zip varchar(5)
)

CREATE TABLE QuoteHistory(
	Email VARCHAR(50) PRIMARY KEY,
    Address VARCHAR(100),
	gallons INT,
	deliverydate DATE,
	suggestedprice DECIMAL,
	price DECIMAL
)

INSERT INTO quotehistory(Email,Address,gallons,deliverydate,suggestedprice,price)
VALUES('123@123.com','4800 Calhoun Rd, Houston, TX 77004',35,"2020-04-10",20,700);