--- Create Table Transaction ---

CREATE TABLE `transactions` (
 `id_transaction` VARCHAR(50),
 `id_product` VARCHAR(50),
 `id_user` VARCHAR(50),
 `gross_income` INT,
 `net_income` INT,
 `date_transaction` TIMESTAMP
);

--- INSERT data TO table ---

INSERT INTO `transactions` (`id_transaction`,`id_product`,`id_user`,`net_income`,`gross_income`,`date_transaction`) VALUES
('TR-0401-1','PRD-1104-2','USR-0801-1',120000,150000,'2017-03-01 21:00:56'),
('TR-0401-1','PRD-1104-3','USR-0801-1',135000,165000,'2017-03-01 21:00:56'),
('TR-0401-2','PRD-1104-14','USR-0801-23',200000,250000,'2017-04-01 21:00:56'),
('TR-0401-3','PRD-1104-4','USR-0801-5',150000,170000,'2017-06-01 21:00:56'),
('TR-0401-3','PRD-1104-54','USR-0801-5',220000,260000,'2017-06-01 21:00:56'),
('TR-0401-4','PRD-1104-10','USR-0801-54',150000,200000,'2017-07-01 21:00:56'),
('TR-0401-4','PRD-1104-60','USR-0801-54',300000,350000,'2017-07-01 21:00:56'),
('TR-0401-4','PRD-1104-80','USR-0801-54',250000,370000,'2017-07-01 21:00:56'),
('TR-0401-5','PRD-1104-22','USR-0801-12',180000,220000,'2017-08-01 21:00:56');

--- Query For Graph ---

SELECT
  DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m') AS `DateTrasaction`,
  COUNT(`transactions`.`id_product`) AS `Total`,
  SUM(`transactions`.`gross_income`) AS `Gross`,
  SUM(`transactions`.`net_income`) AS `Net`
FROM `transactions` WHERE DATE_FORMAT(`transactions`.`date_transaction`, '%Y-%m')
  BETWEEN '2017-01' AND '2017-12'
GROUP BY `date_transaction`
ORDER BY `date_transaction`;
