# gsas-server
### To incorporate composer into the program (DO NOT use sudo):
composer install
./vendor/bin/sail up

### To generate .env file:
cp .env.example .env
php artisan key:generate

### To migrate PostgreSQL database:
php artisan migrate

# Project: GSAS-Project Server
Server for UPLB Graduate School Application System.

## End-point: Applicant Basic Information
Read basic information of the applicant with the specified applicantId.
### Method: GET
>```
>/applicant/:applicantId/basic-info
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: Applicant Basic Information
Create basic information for the applicant.
### Method: POST
>```
>/api/applicants/create-basic-info
>```
### Query Params

|Param|description|
|---|---|
|first_name|(string, required) - The first name of the applicant.|
|middle_name|(string) - The middle name of the applicant.|
|last_name|(string, required) - The last name of the applicant.|
|sex|(string, required) - The sex of the applicant.|
|date_of_birth|(string, required) - The date of birth of the applicant.|
|citizenship|(string, required) - The citizenship of the applicant.|
|civil_status|(string, required) - The civil status of the applicant.|