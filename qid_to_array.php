<?php
echo '---START---'."\r\n";
$campaign = array();

$campaign['sql_for_reports'] = "SELECT *
FROM (
	SELECT m.is_valid
		,rv.is_dismissed
		,rv.id AS `lead_id`
		,rv.qualified
		,rv.member_id
		,m.type
		,rv.partner
		,m.first_qa_date
		,m.final_qa_date
		,m.email AS `email`
		,tcase(m.first_name) AS `first_name`
		,tcase(m.last_name) AS `last_name`
		,tcase(m.address1) AS `address`
		,tcase(m.city) AS `city`
		,m.province AS `state`
		,m.zip AS `zip`
		,m.country AS `country`
		,tcase(m.company_name) AS `company`
		,m.phone AS `phone`
		,m.job_function AS `job_function`
		,m.job_area AS `job_area`
		,m.company_size AS `company_size`
		,tcase(m.industry) AS `industry`
		,tcase(m.job_level) AS `job_level`
		,tcase(m.job_title) AS `job_title`
		,(
			SELECT response
			FROM question_responses
			WHERE question_id = 2918
				AND member_id = rv.member_id LIMIT 1
			) AS `qid_2918`
		,(
			SELECT response
			FROM question_responses
			WHERE question_id = 2920
				AND member_id = rv.member_id LIMIT 1
			) AS `qid_2920`
		,rv.resource_id AS `resource_id`
		,rv.created_at AS `created_at`
		,rv.source AS `source`
		,rv.updated_at AS `updated_at`
		,r.name AS `lead_resource`
		,m.phone_verified
	FROM resource_views rv
	INNER JOIN members m ON rv.member_id = m.id
	INNER JOIN resources r ON rv.resource_id = r.id
	WHERE rv.updated_at >= [DATE]
		AND rv.returned != 1
		AND rv.campaign_id = 13562
	ORDER BY rv.member_id DESC
		,rv.created_at ASC
	) AS leads
WHERE leads.type = 'M'
	AND leads.is_valid = 1
	AND leads.phone_verified = 1
	AND (
		(
			(
				(
					leads.`job_function` = 'Consulting'
					AND leads.`job_area` IN (
						'Customer Experience'
						,'Engineering (non-software)'
						,'Finance'
						,'General Management'
						,'Government and Education'
						,'Human Resources'
						,'Information Technology'
						,'Marketing'
						,'Operations'
						,'Other Professions'
						,'Product Management and Innovation'
						,'Sales'
						,'Software Development'
						)
					)
				OR (
					leads.`job_function` = 'Customer Experience'
					AND leads.`job_area` IN (
						'Customer Relations'
						,'Customer Success'
						,'Customer Support / Service'
						,'Implementation, Onboarding, and Integration'
						)
					)
				OR (
					leads.`job_function` = 'Engineering (non-software)'
					AND leads.`job_area` IN (
						'Bio and Medical Engineering'
						,'Chemical and Petro Engineering'
						,'Civil, Construction, and Project Engineering'
						,'Computer, Electrical and Hardware Engineering'
						,'Design Engineering'
						,'Industrial and Manufacturing Engineering'
						,'Mechanical, Auto, and Aero Engineering'
						,'Quality Assurance (non Software)'
						)
					)
				OR (
					leads.`job_function` = 'Finance'
					AND leads.`job_area` IN (
						'Accounting'
						,'Banking'
						,'Compliance and Risk'
						,'Financial Analysis'
						,'General Finance'
						,'Insurance'
						,'Investment Banking'
						,'Lending and Risk'
						,'Procurement'
						,'Wealth Management'
						)
					)
				OR (
					leads.`job_function` = 'General Management'
					AND leads.`job_area` IN (
						'Executive'
						,'Shared Services and Program Management'
						,'Strategy and Transformation'
						,'Top Executive'
						)
					)
				OR (
					leads.`job_function` = 'Human Resources'
					AND leads.`job_area` IN (
						'Benefits and Compensation'
						,'Diversity'
						,'General'
						,'HR and Recruiting'
						,'Recruiting'
						,'Training, Learning and Development'
						)
					)
				OR (
					leads.`job_function` = 'Information Technology'
					AND leads.`job_area` IN (
						'Data Science, Reporting, and Analytics'
						,'Database and Data Management'
						,'Helpdesk and IT Support'
						,'IT Management General'
						,'IT Program Management, Release, and DevOps'
						,'IT Security'
						,'IT and Software Architecture'
						,'Network, System Admin, and Cloud Infrastructure'
						,'Other Technical'
						,'Project Managers & Business Analysts'
						,'Telecommunications'
						)
					)
				OR (
					leads.`job_function` = 'Marketing'
					AND leads.`job_area` IN (
						'ABM, Customer, and Account Marketing'
						,'Branding'
						,'Channel & Partner Marketing'
						,'Communications'
						,'Content, Design, and Copywriting'
						,'Demand Generation'
						,'Digital, Advertising, Social, and Web Marketing'
						,'E-Business'
						,'General Marketing'
						,'Marketing Analytics'
						,'Marketing Operations and Technology'
						,'Product Marketing'
						)
					)
				OR (
					leads.`job_function` = 'Medical & Health'
					AND leads.`job_area` IN (
						'Customer Experience'
						,'Engineering (non-software)'
						,'Finance'
						,'General Management'
						,'Government and Education'
						,'Human Resources'
						,'Information Technology'
						,'Marketing'
						,'Operations'
						,'Other Professions'
						,'Product Management and Innovation'
						,'Sales'
						,'Software Development'
						)
					)
				OR (
					leads.`job_function` = 'Operations'
					AND leads.`job_area` IN (
						'Change Management'
						,'Contracts'
						,'General Operations'
						,'Logistics'
						,'Quality Management'
						,'Facilities'
						)
					)
				OR (
					leads.`job_function` = 'Product Management and Innovation'
					AND leads.`job_area` IN (
						'Chief Product Officer / Head of Product'
						,'Product Managers'
						,'Product Marketing'
						,'Research & Development and Innovation'
						)
					)
				OR (
					leads.`job_function` = 'Sales'
					AND leads.`job_area` IN (
						'Account Management'
						,'Business Development'
						,'Channel & Partner Sales'
						,'General Sales and Growth'
						,'Sales Enablement'
						,'Sales Engineering'
						,'Sales Operations'
						,'Sales and Marketing'
						)
					)
				OR (
					leads.`job_function` = 'Software Development'
					AND leads.`job_area` IN (
						'Software Dev and Eng'
						,'Software Quality Assurance (QA)'
						,'Software Systems and Applications'
						,'Web and UI/UX Development'
						)
					)
				OR (
					leads.`job_function` = 'Government and Education'
					AND leads.`job_area` IN (
						'Police and Fire'
						,'School Teachers'
						,'School Administration'
						,'Local Government'
						,'Federal Government'
						,'School'
						,'Universities'
						)
					)
				OR (
					leads.`job_function` = 'Other Professions'
					AND leads.`job_area` IN (
						'Construction'
						,'Building Management'
						,'Others'
						)
					)
				)
			AND (
				(
					leads.job_level IN ('C-Level')
					AND (
						leads.`job_title` LIKE '%general%'
						AND leads.`job_title` LIKE '%counsel%'
						)
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						)
					AND leads.`job_title` LIKE '%communicat%'
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						)
					AND leads.`job_title` LIKE '%account%'
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						,'Individual Contributor'
						,'Other'
						)
					AND (
						leads.`job_title` LIKE '%procurement%'
						OR leads.`job_title` LIKE '%research%'
						)
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				(
					leads.`job_function` = 'Finance'
					AND leads.`job_area` IN (
						'Accounting'
						,'Banking'
						,'Compliance and Risk'
						,'Financial Analysis'
						,'General Finance'
						,'Insurance'
						,'Investment Banking'
						,'Lending and Risk'
						,'Procurement'
						,'Wealth Management'
						)
					)
				)
			AND (
				(
					leads.job_level IN ('C-Level')
					AND (
						leads.`job_title` LIKE '%financial%'
						AND leads.`job_title` LIKE '%officer%'
						)
					)
				OR (
					leads.job_level IN ('C-Level')
					AND leads.`job_area` IN ('Compliance and Risk')
					AND (
						leads.`job_title` LIKE '%risk%'
						AND leads.`job_title` LIKE '%officer%'
						)
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						,'Individual Contributor'
						,'Other'
						)
					AND (
						(
							leads.`job_title` LIKE '%investor%'
							AND leads.`job_title` LIKE '%relation%'
							)
						OR leads.`job_title` LIKE '%control%'
						OR leads.`job_title` LIKE '%compliance%'
						OR leads.`job_title` LIKE '%accounting%'
						OR leads.`job_title` LIKE '%tax%'
						OR (
							leads.`job_title` LIKE '%financ%'
							AND leads.`job_title` LIKE '%plan%'
							)
						OR leads.`job_title` LIKE '%analysis%'
						OR (
							leads.`job_title` LIKE '%risk%'
							AND leads.`job_title` LIKE '%management%'
							)
						)
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					)
				)
			AND (
				(
					leads.`job_function` = 'Human Resources'
					AND leads.`job_area` IN (
						'Benefits and Compensation'
						,'Diversity'
						,'General'
						,'HR and Recruiting'
						,'Recruiting'
						,'Training, Learning and Development'
						)
					)
				OR (
					leads.`job_function` = 'Marketing'
					AND leads.`job_area` IN (
						'ABM, Customer, and Account Marketing'
						,'Branding'
						,'Channel & Partner Marketing'
						,'Communications'
						,'Content, Design, and Copywriting'
						,'Demand Generation'
						,'Digital, Advertising, Social, and Web Marketing'
						,'E-Business'
						,'General Marketing'
						,'Marketing Analytics'
						,'Marketing Operations and Technology'
						,'Product Marketing'
						)
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					,'Director Level'
					,'Manager Level'
					,'Individual Contributor'
					,'Other'
					)
				)
			AND (
				(
					leads.`job_function` = 'Human Resources'
					AND leads.`job_area` IN ('General')
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			leads.`job_function` = 'Human Resources'
			AND (
				(
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						)
					AND leads.`job_area` IN ('Benefits and Compensation')
					AND leads.`job_title` LIKE '%benefit%'
					AND leads.`job_title` NOT LIKE '%coordinator%'
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						,'Individual Contributor'
						,'Other'
						)
					AND leads.`job_area` IN ('HR and Recruiting')
					AND leads.`job_title` LIKE '%recruiter%'
					AND leads.`job_title` NOT LIKE '%coordinator%'
					)
				OR (
					leads.job_level IN (
						'C-Level'
						,'VP Level'
						,'Director Level'
						,'Manager Level'
						,'Individual Contributor'
						,'Other'
						)
					AND leads.`job_area` IN ('Training, Learning and Development')
					AND leads.`job_title` LIKE '%training%'
					AND leads.`job_title` LIKE '%coordinator%'
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					,'Director Level'
					)
				)
			AND (
				(
					leads.`job_function` = 'Information Technology'
					AND leads.`job_area` IN (
						'Data Science, Reporting, and Analytics'
						,'Database and Data Management'
						,'Helpdesk and IT Support'
						,'IT Management General'
						,'IT Program Management, Release, and DevOps'
						,'IT Security'
						,'IT and Software Architecture'
						,'Network, System Admin, and Cloud Infrastructure'
						,'Other Technical'
						,'Project Managers & Business Analysts'
						,'Telecommunications'
						)
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					,'Director Level'
					,'Manager Level'
					,'Individual Contributor'
					,'Other'
					)
				)
			AND leads.`job_function` = 'Information Technology'
			AND (
				(
					leads.`job_area` IN ('Data Science, Reporting, and Analytics')
					AND leads.`job_title` LIKE '%data%'
					AND leads.`job_title` LIKE '%architect%'
					)
				OR (
					leads.`job_area` IN ('IT Security')
					AND leads.`job_title` LIKE '%security%'
					AND leads.`job_title` LIKE '%operat%'
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					,'Director Level'
					,'Manager Level'
					,'Individual Contributor'
					,'Other'
					)
				)
			AND (
				(
					leads.`job_function` = 'Marketing'
					AND leads.`job_area` IN (
						'ABM, Customer, and Account Marketing'
						,'Branding'
						,'Channel & Partner Marketing'
						,'Communications'
						,'Content, Design, and Copywriting'
						,'Demand Generation'
						,'Digital, Advertising, Social, and Web Marketing'
						,'E-Business'
						,'General Marketing'
						,'Marketing Analytics'
						,'Marketing Operations and Technology'
						,'Product Marketing'
						)
					)
				)
			AND (
				(
					leads.`job_title` LIKE '%demand%'
					AND leads.`job_title` LIKE '%generation%'
					)
				OR (
					leads.`job_title` LIKE '%digital%'
					AND leads.`job_title` LIKE '%market%'
					)
				OR (
					leads.`job_title` LIKE '%market%'
					AND leads.`job_title` LIKE '%research%'
					)
				OR leads.`job_title` LIKE '%pricing%'
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		OR (
			(
				leads.job_level IN (
					'C-Level'
					,'VP Level'
					,'Director Level'
					,'Manager Level'
					)
				)
			AND (
				(
					leads.`job_function` = 'Sales'
					AND leads.`job_area` IN (
						'Account Management'
						,'Business Development'
						,'Channel & Partner Sales'
						,'General Sales and Growth'
						,'Sales Enablement'
						,'Sales Engineering'
						,'Sales Operations'
						,'Sales and Marketing'
						)
					)
				)
			AND (
				leads.`job_title` NOT LIKE '%coordinator%'
				AND leads.`job_title` NOT LIKE '%consultant%'
				AND leads.`job_title` NOT LIKE '%account executive%'
				AND leads.`job_title` NOT LIKE '%account director%'
				AND leads.`job_title` NOT LIKE '%account manager%'
				AND leads.`job_title` NOT LIKE '%engineer%'
				)
			)
		)
	AND (leads.`country` IN ('BR'))
	AND (leads.company_size IN ('1,000-4,999','5,000-9,999'))
	AND (
		leads.industry IN (
			'Aerospace and Aviation'
			,'Agriculture and Mining'
			,'Business Services'
			,'Computers and Electronics'
			,'Construction and Real Estate'
			,'Education'
			,'Energy, Raw Materials and Utilities'
			,'Finance'
			,'Food and Beverage'
			,'Government'
			,'Healthcare, Pharmaceuticals and Biotech'
			,'Insurance'
			,'Legal'
			,'Manufacturing'
			,'Marketing, Advertising and Public Relations'
			,'Media, Entertainment and Publishing'
			,'Non-Profit'
			,'Retail'
			,'Software, Internet and Technology'
			,'Telecommunications'
			,'Transportation'
			,'Travel, Hotel, Restaurant and Recreation'
			,'Wholesale and Distribution'
			)
		)
	AND (
		leads.qid_2918 IN (
			'Proprietário'
            ,'Executive'
            ,'Diretor(a)','Vice-presidente'
            ,'Diretor'
            ,'Gerente'
            ,'Equipe/colaborador individual'
            ,'Desenvolvedor')
		)
	AND (
		leads.qid_2920 IN (
			'Recur(s)os h(umano)s'
			,'Desenvolvimento (de) negócios/vendas'
			,'Jurídico/compliance'
			,'Finanças'
			,'Marketing'
			,'Operações'
			,'Business Intelligence/dados'
			,'Segurança'
			,'Engenharia'
			,'Tecnologia da informação'
			,'Serviço de atendimento ao consumidor'
			,'Proprietário'
			)
		)
	AND (
		leads.qid_2918 IS NOT NULL
		AND leads.qid_2920 IS NOT NULL
		)
	AND right(leads.`email`, length(leads.`email`) - INSTR(leads.`email`, 'php php info@')) NOT IN (
		SELECT `domain`
		FROM suppressed_domains
		WHERE campaign_id = 13562
		)";

$cq_responses = array(
    array(
        'form_type' => 'Combo',
        'question_id' => '2920',
        'response' => 'Finanças'),
    array(
        'form_type' => 'Combo',
        'question_id' => '2918',
        'response' => 'Gerente')
);

$emptyString = array("","");
foreach ($cq_responses as $cq_response) {
    echo "-----------\r\n";
    
    // Response for textbox are bypass for cq
    if ($cq_response['form_type'] != "TextBox") {
        if (trim($cq_response['response']) == '' &&
        ($cq_response['form_type'] != 'Check' &&
        $cq_response['form_type'] != 'Check_prechecked')) {
            // if member is missing any cq responses return
            // the unqualified reason
            return [
                "unqualified_reason" => 'Missing CQ',
                "reason_for_return" => $reason_for_return,
            ];
        }
        // Check if lead fails due to CQ response
        $tmp = strpos($campaign['sql_for_reports'], 'leads.qid_'.$cq_response['question_id']);
        if ($tmp !== false) {
            $qidStrlen = strlen('leads.qid_'.$cq_response['question_id']) + 5;
            $strTmp = substr($campaign['sql_for_reports'], $qidStrlen + $tmp);

            // Check if there's an option
            // by checking parenthesis
            $paranthesis = substr($campaign['sql_for_reports'], ($qidStrlen + $tmp - 1), 1);
            
            if ($paranthesis == "(") {
                //remove linebreaks, indentions and trailing spaces
                $strTmp = trim(preg_replace('/\s\s+/', ' ', $strTmp));
                $strTmp = str_replace(["' ,'","', '","' , '"],"','",$strTmp);
                $strTmp = str_replace("' )","')",$strTmp);
                $ntmp = strpos($strTmp, "')");
                
                //handle form_type is 'Combo' and one of the options has parenthesis
                $after_ntmp = substr($strTmp, ($ntmp + 1), 3);
                if ($after_ntmp==="','") {
                    $next_ntmp = strpos($strTmp, ')',  ($ntmp + 1));
                    $ntmp = $next_ntmp;
                }

                $str = substr($strTmp, 0, $ntmp);
                $pattern = '/\s*,\s*/';
                $replace = ',';
                $str = preg_replace($pattern, $replace, $str);
                $valid = explode("','", $str);
                $valid = array_map('trim', $valid);
                $valid = str_replace(array('"',"'"), $emptyString, $valid);
                $response = str_replace(array('"',"'"), $emptyString, $cq_response['response']);
                $response = str_replace(array(', ',' ,',' , '), ',', $response);
                
                echo $response."\r\n";
                print_r($valid);
                echo "\r\n";

                if (! in_array($response, $valid )) {
                    echo "\r\n". 'ERROR: CQ Response'."\r\n"."\r\n";
                }
            }
        }
    }
}

ECHO "\r\n ---END---";



?>