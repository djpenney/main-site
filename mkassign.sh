#!/bin/sh

# Originally written by: blackspark
# AWK hell fixed by: Star Weaver

FILE="archived.html"
BASEFOLD="assignments"
#                TITLE="Archived Assignments"
#		FILE="archived.html"

echo "<div id=\"archived\">" > $FILE
echo "<h2>Archived Assignments</h2>" >> $FILE

for dir in $(find ./assignments -type d | cut -c 15-); do

case "$dir" in
	BC)
		TITLE="Business Communications"
		FOLD="$BASEFOLD/$dir"
		;;
	ILL)
		TITLE="Independent Learning Lab"
		FOLD="$BASEFOLD/$dir"
		;;
	ISE)
		TITLE="Internship Support Essentials"
		FOLD="$BASEFOLD/$dir"
		;;
	ProSkills)
		TITLE="Professional Skills"
		FOLD="$BASEFOLD/$dir"
		;;
	TTE)
		TITLE="Technology and Troubleshooting Essentials"
		FOLD="$BASEFOLD/$dir"
		;;
        Templates)
                TITLE="Assignment Templates"
                FOLD="$BASEFOLD/$dir"
                ;;
esac

echo "<h3>$TITLE</h3>" >> $FILE
ls -1vr $FOLD | awk -v FOLD="$FOLD" '{print "<a href=\"" FOLD "/" $0 "\">" $0 "</a><br />"}' >> $FILE

done

echo "</div>" >> $FILE
# echo "<h2>Archived Assignments</h2>" > $FILE
# echo "<h3>$TITLE</h3>" > $FILE
# ls -1vr $FOLD | awk -v FOLD="$FOLD" '{print "<a href=\"" FOLD "/" $0 "\">" $0 "</a><br />"}' >> $FILE
