<?php
    $queries = array(
        "countries" => 'SELECT * FROM countries where 0=0',
        "departments" => 'SELECT * FROM departments where 0=0',
        "employees" => 'SELECT * FROM employees where 0=0',
        "job_history" => 'SELECT * FROM job_history where 0=0',
        "locations" => 'SELECT * FROM locations where 0=0',
        "regions" => 'SELECT * FROM regions where 0=0',
        "jobs" => 'SELECT * FROM jobs where 0=0',
        "jointure_departments" => 'SELECT * FROM departments d JOIN employees e ON d.DEPARTMENT_ID = e.DEPARTMENT_ID where 0=0',
        "jointure_countries" => 'SELECT * FROM countries c JOIN regions r ON c.REGION_ID = r.REGION_ID where 0=0',
        "jointure_jobs" => 'SELECT * FROM jobs j JOIN employees e ON j.JOB_ID = e.JOB_ID where 0=0',
        "jointure_regions" => 'SELECT * FROM regions r JOIN countries c ON r.REGION_ID = c.REGION_ID where 0=0',
        "employees_by_department" => 'SELECT e.FIRST_NAME, e.LAST_NAME, d.DEPARTMENT_NAME FROM employees e JOIN departments d ON e.DEPARTMENT_ID = d.DEPARTMENT_ID where 0=0',
        "employees_salary" => 'SELECT e.FIRST_NAME, e.LAST_NAME, e.SALARY FROM employees e WHERE e.SALARY > 5000',
        "jobs_salary_range" => 'SELECT j.JOB_TITLE, j.MIN_SALARY, j.MAX_SALARY FROM jobs j WHERE j.MIN_SALARY < 5000 AND j.MAX_SALARY > 10000',
        "job_history_by_employee" => 'SELECT e.FIRST_NAME, e.LAST_NAME, jh.START_DATE, jh.END_DATE FROM employees e JOIN job_history jh ON e.EMPLOYEE_ID = jh.EMPLOYEE_ID where 0=0',
        "locations_by_country" => 'SELECT l.STREET_ADDRESS, l.POSTAL_CODE, l.CITY, l.STATE_PROVINCE, c.COUNTRY_NAME FROM locations l JOIN countries c ON l.COUNTRY_ID = c.COUNTRY_ID where 0=0'
    );
?>