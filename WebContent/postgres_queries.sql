select t.pclass, t.total, s.survivors, round((s.survivors*100.0/t.total),2) as saved
              from (select pclass, count(*) as total from titanic.titanic3 group by pclass) t,
              (select pclass, count(*) as survivors from titanic.titanic3 where survived = 1 group by pclass) s
              where t.pclass = s.pclass
              group by t.pclass,t.total,s.survivors;