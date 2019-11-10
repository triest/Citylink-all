/*select log.id,user.login,log.ipaddr,log.source,log.comment,log.date_added
		from billing.users user 
        left join billing.stats_log log 
        on user.contract_id=log.contract_id;
  */
  /*
        select *
		from billing.users user 
        left join billing.stats_log log 
        on user.contract_id=log.contract_id /*where/* user.contract_id=184021*/ /*source='iptvportal' */
      /*  ;
    
        select * from billing.users user;
   select * from   billing.stats_log;     
        
    
    select * from support_log;
    */
    /*
    select log.id,user.login,log.ipaddr,log.source,log.comment,log.date_added
		from billing.users user 
        left join billing.stats_log log 
        on user.contract_id=log.contract_id
        where 
      /*   log.comment like '% Турбокнопка бесплатно%' and*/
      /*   user.login=92433
         ;
   */
    
    
    
       /*
        select * from support_log where   login='92433' order by date desc;
        
        select * from support_log 
        WHERE (MATCH (description) AGAINST ('*кнопка*'  IN BOOLEAN MODE) or support='%test%') 
        and login='92433' ;
   
   
   
   /*select * from support_log;*/
        
        /*select * from support_log WHERE (MATCH (description) AGAINST ('3') or support='%3%') and login='184021' ;*/
        
     /*   
select * from billing.users user ;
        where 
         log.comment like ?s and user.login=?s*/
         
         
   /*      
 select  sl.date_added,sl.id, st.`name`, sl.`comment`,st.type
		from billing.users user 
        left join billing.stats_log sl on user.contract_id=sl.contract_id 
        LEFT JOIN billing.stats_log_types st ON st.`type` = sl.`type`
        where 
         login=92433 order by sl.date_added desc;   
     */   
         select *
		from billing.users user 
        left join billing.stats_log sl on user.contract_id=sl.contract_id 
        LEFT JOIN billing.stats_log_types st ON st.`type` = sl.`type`
        where 
           sl.contract_id=92433 and
          sl.comment like '%remote_addr%'
         order by sl.date_added desc;   
         
         select * from billing.stats_log limit 1;
         
        # select * from billing.stats_log_types limit 2;
 /*
 select * from support_log where login=92433
 order by date desc ;
 */
 #select * from support_log WHERE (MATCH (description) AGAINST (?s) or support=?s) and login=?s
        
        