/*select log.id,user.login,log.ipaddr,log.source,log.comment,log.date_added
		from billing.users user 
        left join billing.stats_log log 
        on user.contract_id=log.contract_id;
  */
  /*
        select *
		from billing.users user 
        left join billing.stats_log log 
        on user.contract_id=log.contract_id;
    */
    
        
        select * from support_log where   login='184021' order by date desc;
        
        select * from support_log WHERE (MATCH (description) AGAINST ('*tvi*'  IN BOOLEAN MODE) or support='%test%') and login='184021' ;
        
        /*select * from support_log WHERE (MATCH (description) AGAINST ('3') or support='%3%') and login='184021' ;*/
        
        
#select * from billing.users user ;
      /*  where 
         log.comment like ?s and user.login=?s*/