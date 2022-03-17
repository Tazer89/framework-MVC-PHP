<h1 align="center">Framework MVC PHP</h1>
Project following the Web MVC presentation standards.


## Information

+ MVC structure
+ Administration Panel
+ Route management 
+ Database connection by PDO
+ Middleware system
+ User authentication
+ CRUD (insert, select, update and delete)
+ Pagination


<table>
  <tr>
    <td>PHP</td>
    <td>MySql</td>
    <td>Composer</td>
    <td>Bootstrap</td>
  </tr>
  <tr>
    <td>7.*</td>
    <td>8.0</td>
    <td>2.2</td>
    <td>5.1</td>
  </tr>
</table>


### Settings

+ Change localhost in .env file

### DB Tables

```sql
CREATE TABLE `depoimentos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
  
ALTER TABLE `depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

```
