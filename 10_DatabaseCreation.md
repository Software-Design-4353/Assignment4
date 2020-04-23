### MySQL codes inputed

```

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
);

CREATE TABLE QuoteHistory(
	OrderTime DATETIME PRIMARY KEY,
	Email VARCHAR(50),
	fullAddress VARCHAR(100),
	gallons INT,
	deliveryDate DATE,
	suggestedPrice DECIMAL(10,2),
	totalAmount DECIMAL(10,2)
);

CREATE TABLE ReadyQuote(
	Mark INT PRIMARY KEY,
	Email VARCHAR(50),
	fullAddress VARCHAR(100),
	gallons INT,
	deliveryDate DATE,
	suggestedPrice DECIMAL(10,2),
	totalAmount DECIMAL(10,2)
);

INSERT INTO ReadyQuote(Mark,Email,fullAddress,gallons,deliveryDate,suggestedPrice,totalAmount)
VALUES(0,'null@null.null','null',0,"0000-00-00",0,0);

```