use covid;
LOAD DATA LOCAL INFILE '/home/elijah/Desktop/covid-19-management-tool/cron_job/patient.txt'
INTO TABLE patient
FIELDS TERMINATED BY '\t'
LINES TERMINATED BY '\n';