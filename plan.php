1)user login ;;
user_id(pk)
mobile_number(pk)
aadhar_number/password(pk)
user_type


2)user details
user_de(pk)
user_id(fk)
name
address
status(0/1)


3)vehicle details(2 wheel/4wheel)
vehicle_id(pk)
user_id(fk)
transport(1/2)
chasis_number
engine_number
company(tata,honda,toyota,mahindra)(4 wheeler)
company(hero,honda,baja,tvs)(2 wheeler)
wheeler(pk)
//pic-----------?


4)reg_number
reg_id(pk)
user_id(fk)
random/custom(1/2)
reg_number(rand/custom)
wheeler(fk)
number AP39EH****(pk)


5)card details custom numbers
card_id
card_number
month
year
cvv
balance_amount




