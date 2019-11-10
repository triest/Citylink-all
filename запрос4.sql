      select *
		from billing.users user 
        left join billing.stats_log sl on user.contract_id=sl.contract_id 
        LEFT JOIN billing.stats_log_types st ON st.`type` = sl.`type`
        where 
           (MATCH (sl.comment) AGAINST ('remote_addr'))
            and
         sl.contact_id=92433 
        
         /*and sl.comment like '%remote_addr%'*/
       
         order by sl.date_added desc;   