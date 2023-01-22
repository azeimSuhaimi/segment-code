create database database_name

create table table_name
(
	id int AUTO_INCREMENT not null unique,
	first_name varchar(100),
	last_name varchar(100),
	email varchar(75),
	password varchar(100),
	location varchar(105),
	dept varchar(100),
	register_time datetime,
	user_id int,
	primary key (id)
	foreign key(user_id) references user(id)
);


select * from table_name;

select * from table_name limit 1;

select first_name, last_name from table_name;

select * from table_name where id = '';
select * from table_name where id = '' and dept = '';

delete from table_name;
delete from table_name where id = '';

update table_name set  email = '' where id = '';

alter table table_name add age varchar(10);

select * from table_name order by last_name asc;
select * from table_name order by last_name DESC;

select distinct location from table_name 

delete from table_name where age between 20 and 30;

select *from table_name where dept like 'de%';
select *from table_name where dept like '%de';
select *from table_name where dept like '%de%';
//////////////////////////////////////////////////////////////////////////////////////
select count(name) as name from users

SELECT * FROM Customers
WHERE Country='Germany' AND City='Berlin';

SELECT * FROM Customers
WHERE City='Berlin' OR City='München';

SELECT * FROM Customers
WHERE NOT Country='Germany';

SELECT * FROM Customers
WHERE Country='Germany' AND (City='Berlin' OR City='München');

SELECT * FROM Customers
WHERE NOT Country='Germany' AND NOT Country='USA';

SELECT column1, column2, ...
FROM table_name
ORDER BY column1, column2, ... ASC|DESC;

SELECT CustomerName, ContactName, Address
FROM Customers
WHERE Address IS NULL;

SELECT CustomerName, ContactName, Address
FROM Customers
WHERE Address IS NOT NULL;

SELECT TOP 3 * FROM Customers;

SELECT * FROM Products
WHERE Price BETWEEN 10 AND 20;

SELECT * FROM Products
WHERE Price NOT BETWEEN 10 AND 20;



 // inner join find record match both table

SELECT table_name.column_name,table_name.column_name
FROM table1
INNER JOIN table2
ON table1.column_name = table2.column_name;

SELECT Orders.OrderID, Customers.CustomerName
FROM Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;

SELECT Orders.OrderID, Customers.CustomerName, Shippers.ShipperName
FROM ((Orders
INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID);


// left join find table1 only record but must match to table2 if no match table2 it will be null

SELECT table_name.column_name,table_name.column_name
FROM table1
LEFT JOIN table2
ON table1.column_name = table2.column_name;

SELECT Customers.CustomerName, Orders.OrderID
FROM Customers
LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID
ORDER BY Customers.CustomerName;


// right join find table2 only record but must match to table1 if no match table1 it will be null 

SELECT table_name.column_name,table_name.column_name
FROM table1
RIGHT JOIN table2
ON table1.column_name = table2.column_name;

SELECT Orders.OrderID, Employees.LastName, Employees.FirstName
FROM Orders
RIGHT JOIN Employees ON Orders.EmployeeID = Employees.EmployeeID
ORDER BY Orders.OrderID;


//The FULL OUTER JOIN keyword returns all records when there is a match in left (table1) or right (table2) table records.

SELECT table_name.column_name
FROM table1
FULL OUTER JOIN table2
ON table1.column_name = table2.column_name
WHERE condition;

SELECT Customers.CustomerName, Orders.OrderID
FROM Customers
FULL OUTER JOIN Orders ON Customers.CustomerID=Orders.CustomerID
ORDER BY Customers.CustomerName;

// nested query

SELECT * from employee where emp_id 
IN(select emp_id from work_with where total_sale > 30000);

select client_name from client 
where branch_id = (SELECT branch_id from branch where mgr_id = 102);





