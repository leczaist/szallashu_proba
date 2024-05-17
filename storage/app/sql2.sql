WITH RECURSIVE d AS
(
    SELECT '2001-01-01' AS DATE
    UNION ALL
    SELECT
        DATE + INTERVAL 1 DAY
    FROM
        d
    WHERE
        DATE <= NOW()
)

SELECT `DATE`, (SELECT GROUP_CONCAT(companyName) FROM companies WHERE companyFoundationDate = DATE) FROM d;