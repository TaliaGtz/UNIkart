delimiter =)
create procedure sp_Alta
(
	paccion  tinyint,
	ptable_name  varchar(45),
	pVar1  varchar(45),
	pVar2  varchar(45),
	pVar3  varchar(45),
	pVar4  varchar(45),
	pVar5  varchar(45),
	pVar6  varchar(45),
	pVar7  varchar(45),
	pVar8  varchar(45),
	pVar9  varchar(45),
	pVar10  varchar(45)
)
BEGIN
	
	if paccion = 2 then		#2_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2
        );
			
	end if;
	if paccion = 3 then 	#3_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2,
            pVar3
        );
			
	end if;
	if paccion = 4 then		#4_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2,
            pVar3,
            pVar4
        );
			
	end if;
	if paccion = 7 then		#7_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2,
            pVar3,
            pVar4,
            pVar5,
            pVar6,
            pVar7
        );
		
	end if;
	if paccion = 9 then 	#9_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2,
            pVar3,
            pVar4,
            pVar5,
            pVar6,
            pVar7,
            pVar8, 
            pVar9
        );
			
	end if;
	if paccion = 0 then	#10_elementos
		INSERT INTO ptable_name 
        VALUES(
            pVar1,
            pVar2,
            pVar3,
            pVar4,
            pVar5,
            pVar6,
            pVar7,
            pVar8,
            pVar9,
            pVar10
        );
			
	end if;
	
	
END =)
delimiter ;




delimiter =)
create procedure sp_Select
(
	paccion  tinyint,
	ptable_name  varchar(45),
	pwhere  varchar(45),
	pwhereThis  varchar(45),
	ptableA varchar(45),
	ptableB varchar(45),
	ptableC varchar(45),
	pVar1 varchar(45),
	pVar2 varchar(45),
	pVar3 varchar(45),
	pVar4 varchar(45),
	pVar5 varchar(45),
	pVar6 varchar(45),
	pVar7 varchar(45)
)
BEGIN
	
	if paccion = 1 then		#1_1_1_elementos
		SELECT pVar1 
                    FROM ptable_name 
                    WHERE pwhere = pwhereThis;
			
	end if;
	if paccion = 2 then		#2_1_elementos
		SELECT pVar1, pVar2 FROM ptable_name;
			
	end if;
	if paccion = 3 then		#2_1_1elementos
		SELECT pVar1, pVar2
                    FROM ptable_name
                    WHERE pwhere = pwhereThis;
		
	end if;
	if paccion = 4 then		#3_1_elementos
		SELECT pVar1, pVar2, pVar3 FROM ptable_name;
		
	end if;
	if paccion = 5 then		#3_1_1_elementos
		SELECT pVar1, pVar2, pVar3 
            FROM ptable_name 
            WHERE pwhere = pwhereThis;
		
	end if;
	if paccion = 6 then		#4_1_elementos
		SELECT pVar1, pVar2, pVar3, pVar4 
                FROM ptable_name;
		
	end if;
	if paccion = 7 then		#6_1_1_elementos
		SELECT pVar1, pVar2, pVar3, pVar4, pVar5, pVar6 
                FROM ptable_name
                WHERE pwhere = pwhereThis;
		
	end if;
	if paccion = 8 then		#7_1_1_elementos
		SELECT pVar1, pVar2, pVar3, pVar4, pVar5, pVar6, pVar7
                    FROM ptable_name
                    WHERE pwhere = pwhereThis;
			
	end if;
	if paccion = 9 then		#Join_elementos
		SELECT A.pVar1, B.pVar2, C.pVar3
                        FROM ptableA A
                        INNER JOIN ptableB B ON A.pVar1 = B.pVar5
                        INNER JOIN ptableC C ON B.pVar2 = C.pVar6
                        WHERE A.pVar1 = pwhereThis;
			
	end if;
	

END =)
delimiter ;