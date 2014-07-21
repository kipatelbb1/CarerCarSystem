days = ["Mon", "Tue", "Wed", "Thu", "Fri"]

counter = 8


for time in range(8, 17):
    print " "
    print "<tr>"
    for i in range(0,len(days)):
        print '<td id="' + days[i] + ''+ str(time) +'00"><?php compareData("' + days[i] + ''+ str(time) + '00",$Dates,$Locations,$Names); ?></td>'

    print "</tr>"

     


raw_input() 
