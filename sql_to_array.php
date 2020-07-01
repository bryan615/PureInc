<?php 

$sql = "

SELECT * FROM (SELECT m.is_valid,rv.is_dismissed,rv.id as `lead_id`,rv.qualified,rv.member_id,m.type,rv.partner,m.first_qa_date,m.final_qa_date,m.email as `email`,tcase(m.first_name)  AS `first_name`,tcase(m.last_name)  AS `last_name`,tcase(m.address1)  AS `address`,tcase(m.city)  AS `city`,m.state  AS `state`,m.zip as `zip`,m.country  AS `country`,tcase(m.company_name)  AS `company`,m.phone as `phone`,m.job_function  AS `job_function`,m.job_area  AS `job_area`,CASE m.company_size WHEN '1 to 9' THEN '1-9' WHEN '10 to 24' THEN '10-24' WHEN '25-49' THEN '25-49' WHEN '50-99' THEN '50-99' WHEN '100-249' THEN '100-200' ELSE m.company_size  END AS `company_size`,tcase(m.industry) AS `industry`,tcase(m.job_level) AS `job_level`,tcase(m.job_title) AS `job_title`,(SELECT response FROM question_responses WHERE question_id = 4416 AND member_id = rv.member_id LIMIT 1) AS `qid_4416`,(SELECT response FROM question_responses WHERE question_id = 4417 AND member_id = rv.member_id LIMIT 1) AS `qid_4417`,rv.resource_id  as `resource_id`,rv.created_at  as `created_at`,rv.source  as `source`,rv.updated_at  as `updated_at`,r.name as `lead_resource`,  m.phone_verified  FROM resource_views rv INNER JOIN members m ON rv.member_id = m.id INNER JOIN resources r ON rv.resource_id = r.id WHERE rv.updated_at >= [DATE] AND rv.returned != 1 AND rv.campaign_id = 14552 ORDER BY rv.member_id desc,rv.created_at asc) AS leads WHERE leads.type = 'M' AND leads.is_valid = 1 AND leads.phone_verified = 1 AND ( ((leads.job_level IN ('C-Level','VP Level','Director Level')) AND ( leads.`country` IN ('CA')) AND (leads.company_size IN ('1-9','10-24','25-49','50-99','100-200')) AND ((leads.`job_function` = 'Finance' AND leads.`job_area` IN ('General Finance')) OR (leads.`job_function` = 'General Management' AND leads.`job_area` IN ('General Management')) OR (leads.`job_function` = 'Human Resources' AND leads.`job_area` IN ('General')) OR (leads.`job_function` = 'Information Technology' AND leads.`job_area` IN ('IT Management General')) OR (leads.`job_function` = 'Marketing' AND leads.`job_area` IN ('General Marketing')) OR (leads.`job_function` = 'Operations' AND leads.`job_area` IN ('General Operations')) OR (leads.`job_function` = 'Sales' AND leads.`job_area` IN ('General Sales and Growth'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution'))) )  AND (leads.qid_4416 IN ('Business Continuity & Backup','Networking','SaaS Protection')) AND (leads.qid_4417 IN ('Sales and marketing','PSA tools for efficiently managing operations','Business strategy/driving growth/profitability','Remote monitoring and management','Business continuity/robust tools for reducing client risk from ransomware, etc.')) AND (leads.qid_4416 IS NOT NULL  AND leads.qid_4417 IS NOT NULL ) AND right(leads.`email`, length(leads.`email`)-INSTR(leads.`email`, '@')) NOT IN (SELECT `domain` FROM suppressed_domains WHERE campaign_id = 14552)

";


//13876
$sqlxx = "
SELECT * FROM (SELECT m.is_valid,rv.is_dismissed,rv.id as `lead_id`,rv.qualified,rv.member_id,m.type,rv.partner,m.first_qa_date,m.final_qa_date,m.email as `email`,tcase(m.first_name)  AS `first_name`,tcase(m.last_name)  AS `last_name`,tcase(m.address1)  AS `address`,tcase(m.city)  AS `city`,m.state  AS `state`,m.zip as `zip`,m.country  AS `country`,tcase(m.company_name)  AS `company`,m.phone as `phone`,m.job_function  AS `job_function`,m.job_area  AS `job_area`,m.company_size AS `company_size`,tcase(m.industry) AS `industry`,tcase(m.job_level) AS `job_level`,m.company_revenue AS `company_revenue`,tcase(m.job_title) AS `job_title`,r.name as `lead_resource`,rv.resource_id  as `resource_id`,rv.created_at  as `created_at`,rv.source  as `source`,rv.updated_at  as `updated_at`,  m.phone_verified  FROM resource_views rv INNER JOIN members m ON rv.member_id = m.id INNER JOIN resources r ON rv.resource_id = r.id WHERE rv.updated_at >= [DATE] AND rv.returned != 1 AND rv.campaign_id = 13876 ORDER BY rv.member_id desc,rv.created_at asc) AS leads WHERE leads.type = 'M' AND leads.is_valid = 1 AND leads.phone_verified = 1 AND ( ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Operations' AND leads.`job_area` IN ('General Operations'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%operating%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%coo%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level','VP Level','Director Level','Manager Level','Individual Contributor','Other')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Information Technology' AND leads.`job_area` IN ('Data Science, Reporting, and Analytics','IT Management General','IT and Software Architecture','Project Managers & Business Analysts'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution'))) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Product Management and Innovation' AND leads.`job_area` IN ('Product Management'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%product%' AND leads.`job_title` LIKE '%officer%' AND leads.`job_title` LIKE '%%') OR leads.`job_title` LIKE '%cpo%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'General Management' AND leads.`job_area` IN ('General Management','General Management'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%strategy%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cso%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%administrative%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cao%' OR leads.`job_title` LIKE '%president%' OR leads.`job_title` LIKE '%principal%' OR (leads.`job_title` LIKE '%vice%' AND leads.`job_title` LIKE '%chairman%')) ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Marketing' AND leads.`job_area` IN ('General Marketing'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%digital%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cdo%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) AND ((leads.`job_function` = 'Finance' AND leads.`job_area` IN ('Accounting','Compliance and Risk','General Finance'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%audit%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cao%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%compliance%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cco%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%financial%' AND leads.`job_title` LIKE '%officer%' AND leads.`job_title` LIKE '%%') OR leads.`job_title` LIKE '%cfo%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%information%' AND leads.`job_title` LIKE '%risk%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%ciro%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%risk%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cro%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Medical & Health' AND leads.`job_area` IN ('General (yes) Management'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%medical%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cmo%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Human Resources' AND leads.`job_area` IN ('General'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%people%' AND leads.`job_title` LIKE '%officer%')) ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%')  OR ((leads.job_level IN ('C-Level')) AND ( leads.`country` IN ('US')) AND (leads.company_size IN ('1 to 9','10 to 24','25-49','50-99','100-249','250-499','500-999','1,000-4,999','5,000-9,999','10,000-49,999','50K-100K','>100K')) 
AND ((leads.`job_function` = 'Information Technology' AND leads.`job_area` IN ('IT Management General'))) AND (leads.industry IN ('Aerospace and Aviation','Agriculture and Mining','Business Services','Computers and Electronics','Construction and Real Estate','Education','Energy, Raw Materials and Utilities','Finance','Food and Beverage','Government','Healthcare, Pharmaceuticals and Biotech','Insurance','Legal','Manufacturing','Marketing, Advertising and Public Relations','Media, Entertainment and Publishing','Non-Profit','Retail','Software, Internet and Technology','Telecommunications','Transportation','Travel, Hotel, Restaurant and Recreation','Wholesale and Distribution')) AND ((leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%information%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cio%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%information%' AND leads.`job_title` LIKE '%security%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%ciso%' OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%innovation%' AND leads.`job_title` LIKE '%officer%') OR (leads.`job_title` LIKE '%chief%' AND leads.`job_title` LIKE '%technology%' AND leads.`job_title` LIKE '%officer%') OR leads.`job_title` LIKE '%cto%') ) AND (leads.`job_title` NOT LIKE '%junior%' AND leads.`job_title` NOT LIKE '%assistant%' AND leads.`job_title` NOT LIKE '%intern%') )  AND (leads.company_revenue IN ('< $1 Million','$1-9 Million','$10-49 Million','$50 - 99 Million','$100 - 249 Million','$250 - 499 Million','$500 M - 1 Billion','>$1 Billion')) AND right(leads.`email`, length(leads.`email`)-INSTR(leads.`email`, '@')) NOT IN (SELECT `domain` FROM suppressed_domains WHERE campaign_id = 13876)
";

//$sql = str_replace(array("\t", "\r", "\n"), ' ', $sql);
//$sql = str_replace('  ', ' ', $sql);

$resp = array();
//STEP 1: do a recursive regex search to get any string inside a parenthesis (multilevel)
function recsSplit($sql, $layer) {
    
    //so that the data will not get lost
    global $resp;

    preg_match_all("/\((([^()]*+)(?:(?R)(?2))*)\)/", $sql, $matches);
    if (count($matches) > 1) {
        for ($i = 0; $i < count($matches[1]); $i++) {
            if (is_string($matches[1][$i])) {
                if (strlen($matches[1][$i]) > 0) {

                    //capture all level 1 strings
                    if (strpos($matches[1][$i], 'job_function') 
                        && strpos($matches[1][$i], 'job_area')
                        && $layer == 1
                    ) {
                        $resp[] = $matches[1][$i];
                    }

                    //recursive function call
                    recsSplit($matches[1][$i], $layer + 1);
                }
            }
        }
    }

    return $resp;
}
//save to an array the strings of interest
$array = recsSplit($sql, 0);

//STEP 2: parse and decode the strings to be usable in step 3.
$filt_arr = [];
foreach ($array as $i => $str) {
    //seperate by the 'AND' where condition
    $lvlone = explode('AND (', $str);

    //loop on all level 1 conditions 
    foreach ($lvlone as $cond) {
        //check if the current row set has multiple job_function (enclosed in 'OR')
        if (strpos($cond, 'OR (')) {
            $filt_arr_string[$i] = 'AND ('.$cond;
            $lvltwo = explode('OR (', $cond);
            foreach ($lvltwo as $ii => $cond2) {
                //only get the value with job_function and job_area
                if (strpos($cond2, 'job_function') && strpos($cond2, 'job_area')) {
                    if ($ii == 0) {
                        $filt_arr[$i][] = $cond2;
                    } else {
                        $filt_arr[$i][] = "OR (".$cond2;
                    }
                }
            }
            
        //else, if the current row set has only 1 job_functions value
        } else { 
            //only get the value with job_function and job_area
            if (strpos($cond, 'job_function') && strpos($cond, 'job_area')) {
                $filt_arr[$i][] = "AND (".$cond;
            }
        }
    }
}

//print_r($filt_arr);exit;

$retr = [];
$ctr = 0;
//STEP 3: convert parsed data into usable array for Divine
foreach ($filt_arr as $i => $str) {

    //check if the current row set has multiple job_functions (in 'OR')
    if (count($str) > 1) {
        $retr[$ctr]['string'] = $filt_arr_string[$i];
    } else {
        $retr[$ctr]['string'] = $str[0];
    }

    

    foreach ($str as $ii => $str2) {
        //get the 1st string which are enclosed in single quote
        preg_match("/\'(.*?)\'/", $str2, $func);
        $retr[$ctr]['array'][$ii]['job_function'] = $func[1];

        //get all string which are enclosed in singlequotes inside a parenthesis (WHERE IN)
        if (preg_match_all("/'[^']*'(?=[^(']*('[^']*'[^'(]*)*\))/", $str2, $areas )) {
            $retr[$ctr]['array'][$ii]['job_area'] = $areas[0];
        }
    }
    
    $ctr++;
}

print_r($retr);

//add custom code validator here