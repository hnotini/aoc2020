SELECT * FROM day1_1;

SELECT DISTINCT a.values*b.values  FROM day1_1 a JOIN day1_1 b WHERE a.values + b.values = 2020;

SELECT DISTINCT a.values * b.values * c.values FROM day1_1 a JOIN day1_1 b JOIN day1_1 c WHERE a.values + b.values + c.values = 2020;

