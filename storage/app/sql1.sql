SET @sql = NULL;
SELECT
    GROUP_CONCAT(DISTINCT
    CONCAT(
        'max(case when activity = ''',
      activity,
      ''' then companyName end) AS ''',
      activity,
      ''''
    )
  ) INTO @sql
FROM companies;

SET @sql = CONCAT('SELECT ', @sql, '
                  FROM companies
                  GROUP BY companyId');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
