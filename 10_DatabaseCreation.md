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
    zip varchar(5),
    clientType INT(1),
)

CREATE TABLE QuoteHistory(
	Email VARCHAR(50) PRIMARY KEY,
    Address VARCHAR(100),
	gallons INT,
	deliverydate DATE,
	suggestedprice DECIMAL(10,2),
	price DECIMAL(10,2)
)

CREATE TABLE ReadyQuote(
    Mark INT PRIMARY KEY,
	Email VARCHAR(50),
    fullAddress VARCHAR(100),
	gallons INT,
	deliverydate DATE,
	suggestedprice DECIMAL(10,2),
	totalAmount DECIMAL(10,2)
);

INSERT INTO ReadyQuote(Mark,Email,fullAddress,gallons,deliverydate,suggestedprice,totalAmount)
VALUES(0,'null@null.null','null',0,"0000-00-00",0,0);







### MySQL codes inputed

```

CREATE TABLE LoginInfo (
    Email VARCHAR(50) PRIMARY KEY,
    Password VARCHAR(50),
);

CREATE TABLE ClientInfo (
    Email VARCHAR(50) PRIMARY KEY,
    fName VARCHAR(50),
    lName VARCHAR(50),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(50),
    state VARCHAR(50),
    zip VARCHAR(10),
    clientType INT(1),
    FORGEIGN KEY (Email)
    REFERENCES LoginInfo (Email)
    ON DELETE CASCADE
);

CREATE TABLE QuoteHistory(
	Email VARCHAR(50) PRIMARY KEY,
    fullAddress VARCHAR(100),
	gallons INT,
	deliverydate DATE,
	suggestedprice DECIMAL(10,2),
	totalAmount DECIMAL(10,2)
);

CREATE TABLE ReadyQuote(
    Mark INT PRIMARY KEY,
	Email VARCHAR(50),
    fullAddress VARCHAR(100),
	gallons INT,
	deliverydate DATE,
	suggestedprice DECIMAL(10,2),
	totalAmount DECIMAL(10,2)
);

INSERT INTO ReadyQuote(Mark,Email,fullAddress,gallons,deliverydate,suggestedprice,totalAmount)
VALUES(0,'null@null.null','null',0,"0000-00-00",0,0);


```