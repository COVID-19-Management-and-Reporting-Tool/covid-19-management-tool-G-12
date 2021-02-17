use covid;
LOAD DATA LOCAL INFILE '/home/elijah/Desktop/covid-19-management-tool/cron_job/patients.txt'
INTO TABLE patients
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n';