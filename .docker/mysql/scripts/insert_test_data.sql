INSERT INTO company (code_company,name_company,country)
VALUES (1,'name1','country1');
INSERT INTO company (code_company,name_company,country)
VALUES (2,'name2','country2');
INSERT INTO company (code_company,name_company,country)
VALUES (3,'name3','country3');
INSERT INTO company (code_company,name_company,country)
VALUES (4,'name4','country4');
INSERT INTO company (code_company,name_company,country)
VALUES (5,'name5','country5');

INSERT INTO security (code_security,instrument,bid,ask,yield,high,low,currency,date_price,time_price)
VALUES (1,'instrument1',1,1,1,1,1,'currency1',CURDATE(),NOW());
INSERT INTO security (code_security,instrument,bid,ask,yield,high,low,currency,date_price,time_price)
VALUES (2,'instrument2',2,2,2,2,2,'currency2',CURDATE(),NOW());
INSERT INTO security (code_security,instrument,bid,ask,yield,high,low,currency,date_price,time_price)
VALUES (3,'instrument3',3,3,3,3,3,'currency3',CURDATE(),NOW());
INSERT INTO security (code_security,instrument,bid,ask,yield,high,low,currency,date_price,time_price)
VALUES (4,'instrument4',4,4,4,4,4,'currency4',CURDATE(),NOW());
INSERT INTO security (code_security,instrument,bid,ask,yield,high,low,currency,date_price,time_price)
VALUES (5,'instrument5',5,5,5,5,5,'currency5',CURDATE(),NOW());

INSERT INTO company_security (code_company_security,code_company,code_security)
VALUES (1,1,1);
INSERT INTO company_security (code_company_security,code_company,code_security)
VALUES (2,2,2);
INSERT INTO company_security (code_company_security,code_company,code_security)
VALUES (3,3,3);
INSERT INTO company_security (code_company_security,code_company,code_security)
VALUES (4,4,4);
INSERT INTO company_security (code_company_security,code_company,code_security)
VALUES (5,5,5);
