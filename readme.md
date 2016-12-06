## Installation Instructions.

1) Setup a mysql server with a database named, cactuspaper.
2) Pull in php dependencies using composer.

>> php composer.phar install

3) Pull in js dependencies using npm

>> npm install


4) Compile sass etc using gulp

>> gulp

5) Initialize database

>> php artisan migrate

6) Edit .env to suit either using mine or from the example provided.
   The ALCHMEY API Key is necessary.


7) Serve using

>> php artisan server

8) Troubleshoot enivitable troubles.


9) Since I didn't create an admin panel yet, you'll need to manually create Groups to join.
This can be done through phpmyadmin etc, but it may be more interesting/convenient to use tinker

>> php artisan tinker
>> $group = new App\Group
>> $group->name = "My Group"
>> $group->save()
>> App\Group::all()

By default, all users have the student relation to groups, but they can be manually changed
to teachers via tinker.
eg:
>> App\Membership::all()
>> $membership = App\membership::find(1)
>> $membership->user_role = "teacher"

Another point of interest may be:
>> App/Concept::all()
after some articles have been inserted.


I'd like to try to sell subscriptions to schools and sutff soon, so I'm not making it avaliable
for further development outside the scope of the assignment.
http://www.binpress.com/license/edit/h/14dd226435c8730ae760097c2d0c86d5882bdbef
