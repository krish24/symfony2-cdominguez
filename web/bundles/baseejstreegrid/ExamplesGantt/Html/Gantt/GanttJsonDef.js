Layout = {
   Cfg: { 
      id:"Gantt", SuppressCfg:"1",  // Base settings, suppresses saving configuration to cookies
      NumberId:"1", IdChars:"0123456789", // Controls generation of new row ids
      NoFormatEscape:"1",           // You can use HTML code in formatting, set here because ValueSeparator and RangeSeparator contain HTML code
      Sort:"id",                    // Default sort is by ID
      Group:"N1",                   // The grid is grouped by Task by default
      GroupRestoreSort:"1",         // Restores original sorting after ungroup
      Undo:"1",                     // Permits undo / redo changes by Ctrl+Z / Ctrl + Y
      ChildParts:"0",               // Switches off child parts, here is not needed
      ScrollLeftLap:"0",            // Permits saving left scroll to cookies
      DefaultDate:"5/1/2008",       // Default date in calendar for empty date
      MenuColumnsCount:"2",         // Displays column names in menu in two columns
      MidWidth:"325", MinRightWidth:"200", MinLeftWidth:"200", // Sizes and scrolls for column sections
      Style:"Standard",             // Presets Standard CSS style
      ResizingMain:"3",             // Users can resize grid by right bottom edge

      // Settings for Calendar list dialog, the Value column
      CalendarsRepeatType:"Enum", CalendarsRepeatEnum:"||Weekly|Daily", CalendarsRepeatEnumKeys:"||w|d",
      CalendarsValueType:"Enum", CalendarsValueEnum:"|Not work|Exception|Lunch|Weekend|Holiday|Reserved1|Reserved2", 
      CalendarsValueEnumKeys:"||0|1|2|3|4|5", CalendarsValueCaption:"Type" 
      },

   Def: [
      { Name:"R", CDef:"" },  // The standard rows cannot have children

      { Name:"Group", 
         Calculated:"1", CalcOrder:"N2HtmlPostfix,S,E,U,C,F,G,P", // Grouping row is calculated to show summary for its children
         Expanded:"1",              // Grouping row shows its children by default
         EditCols:"Main",           // When user changes value in main column (N1 - Task), the value is copied also to the children -->
         SFormula:"ganttstart()",   // Gets the first start date from its children, including milestones
         EFormula:"ganttend()",     // Gets the last end date from its children, including milestones
         UFormula:"E&&S?Grid.DiffGanttDate(E,S):''",   // Gets the last end date from its children, including milestones
         CFormula:"ganttpercent()",             // Calculates average task completion from its children
         FFormula:"sumrange()", FCanEdit:"0",   // Merges all date ranges from its children
         PFormula:"sum()",                      // Sums prices
         CDef:"R",                              // Grouping rows can contain standard rows as children
         DButton:"", RButton:"",                // No dependencies and resources can be changed in group row
         GGanttClass:"GanttG", GGanttIcons:"1", // Gantt setting specific for Group rows, changes colors and adds side icons
         GGanttSummary:"1",                     // Row works as Gantt Summary, when moved, it moves its child tasks too -->
         GGanttEdit:"Main",                     // Only main the bar can be edited to move all the summary children -->
         SCanEdit:"1",                          // Lets users to edit start date to move the Gantt Summary and its children -->
         GroupMain:"N1",                        // Tree will be shown in Task column
         CMaxChars:"100",                       // Ensures setting returned value when grouped by Complete column         
         ParentCDef:"Group",                    // When grouped by any column, new rows added to root will be these groups
         CanFilter:"2",                         // Hides the group when all its tasks are hidden by filter
         idVisible:"0",                         // Hides the automatically generated id
         CanSelect:"0",                         // Hides the panel Select icon
         AggChildren:"1",                       // Aggregates children of task instead of itself, used when calculating the summary fixed row
         N2HtmlPostfixFormula:"' <span style=\"color:green;\">('+count(4)+')</span>'" // Shows the count of children as green suffix
         },

      { Name:"GroupTask", 
         GroupCols:"|N1|C,N1", Group:"1", Def:"Group", GroupMain:"N2",  // When grouping by Task, shows tree in Section column
         ParentCDef:"GroupTask"    // When grouped by task, new rows added to root will be of these groups
         },
         
      // Default row for resources
      { Name:"Resource", 
         idVisible:"0", CanEdit:"0", CanDelete:"", CanSelect:"0", Calculated:"1",
         GGanttAvailability:"N2#3,N2#1,N2#8", GGanttAvailabilityFormat:"0.#",
         GGanttStart:"", GGanttEnd:"", GGanttEdit:"",
         N1:"Resource",
         
         SType:"Float", SFormat:"0.00", SEditMask:"^\d*[\d\.\,]?\d*$", SEditFormat:"", SCanEdit:"1",
         SFormula:"Grid.Resources[Row.N2]?Grid.Resources[Row.N2].Price:0", 
         SOnChange:"Grid.Resources[Row.N2].Price = Value; Grid.Calculate(1)",

         EType:"Text", EFormat:"", ECanEdit:"0",
         EFormula:"Grid.Resources[Row.N2]?Grid.Resources[Row.N2].Availability:0",
         EOnChange:"Grid.Resources[Row.N2].Availability = Value;",
         EButton:"Dates", 
         EDatesRepeatType:"Enum", EDatesRepeatEnum:"||Weekly|Daily", EDatesRepeatEnumKeys:"||w|d",
         EDatesValueType:"Float", EDatesValueFormat:"0.00", EDatesValueCaption:"Count",
         UType:"Float", UFormat:"0.##", UFormula:"ganttresourcepeak(Row.N2)",
         CType:"Enum", CEnum:"|wrk|mat", CEnumKeys:"|1|2", CCanEdit:"1",
         CFormula:"Grid.Resources[Row.N2] ? Grid.Resources[Row.N2].Type : 1",
         COnChange:"Grid.Resources[Row.N2].Type = Value; Grid.Calculate(1)",
         DType:"Float", DFormat:"0.00", DFormula:"ganttresourceunits(Row.N2)",
         AType:"Float", AFormat:"0.00", AFormula:"D*S",
         
         PVisible:"0", TButton:""
         }       
      ],

   LeftCols: [
      { Name:"id", Type:"Int", Width:"20", WidthPad:"17", CanEdit:"0" }, // id / row number column
      { Name:"N1", Width:"70", Type:"Text" },   // Task column
      { Name:"N2", Width:"80", Type:"Text" }   // Section column
      ],
   Cols: [
      { Name:"S", Width:"80", DefaultDate:"5/1/2008 9:00", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH" }, // Start date column
      { Name:"E", Width:"80", DefaultDate:"5/1/2008 18:00", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH", CanEmpty:"1" }, // End date column
      { Name:"U", Width:"31", Type:"Text", Align:"Right", MenuName:"Duration" }, // Duration column
      { Name:"C", Width:"37", Type:"Float", EditMask:"^\\d*[\\d\\.\\,]?\\d*$", Format:"##.##\\%;;0\\%", MenuName:"Complete" }, // Complete column
      { Name:"D", Width:"50", Type:"Text", Range:"1", MenuName:"Descendants" }, // Descendants, ids of next tasks
      { Name:"A", Width:"50", Type:"Text", Range:"1", MenuName:"Ancestors" },   // Ancestors, ids of previous tasks
      { Name:"L", Width:"40", Type:"Float", CanEmpty:"1", CanEdit:"0", MenuName:"Slack" },  // Slack for critical path, automatically filled
      { Name:"T", Width:"70", Type:"Select", OnClickSideDefaults:"Grid.ShowGanttCalendars(Row,Col)", OnEnter:"Grid.ShowGanttCalendars(Row,Col)" }, // Custom calendar / excluded dates
      { Name:"F", Width:"150", Type:"Date", DefaultDate:"5/1/2008 9:00~5/1/2008 18:00", Range:"1", Button:"", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'" },  // Real flow column
      { Name:"FI", Visible:"0", Width:"70", MenuName:"Real flow info" }, // Real flow info column
      { Name:"R", Width:"110", Type:"Text" }, // Resources column
      { Name:"P", Width:"55", Type:"Float", Format:",0.00", Formula:"Grid.GetGanttPrice(Row,'G')" }, // Task price column
      { Name:"M", Visible:"0", Width:"75", Type:"Date", Button:"", Range:"1", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'" }, // Flag column
      { Name:"I", Visible:"0", Width:"60", Type:"Text", Range:"1" }, // Flag info column
      { Name:"S1", Visible:"0", Width:"80", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH" }, // Min Start date column
      { Name:"S2", Visible:"0", Width:"80", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH" }, // Max Start date column
      { Name:"E1", Visible:"0", Width:"80", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH" }, // Min End date column
      { Name:"E2", Visible:"0", Width:"80", Type:"Date", Format:"MMM dd, '<span style=\"color:blue\">'HH'</span>'", EditFormat:"MM/dd/yy HH" }, // Max End date column
      { Name:"NI", Visible:"0", Width:"120"} // Main task info column
      ],
   RightCols: [
      // --- Gantt chart column ---
      // --- Defines all Gantt chart setting ---
      { Name:"G",  
         Type:"Gantt", MenuName:"Gantt chart", // Basic setting, type and name in columns menu
         GanttStart:"S", GanttEnd:"E", GanttDuration:"U", GanttComplete:"C", GanttResources:"R", GanttText:"NI", // Defines source columns for Main tasks
         GanttMinStart:"S1", GanttMaxStart:"S2", GanttMinEnd:"E1", GanttMaxEnd:"E2", // Start and end date constraints
         GanttSlack:"L", // Where will be filled information for critical path
         GanttFlow:"F", GanttFlowText:"FI",  // Defined source columns for Flow
         GanttFlags:"M", GanttFlagTexts:"I", // Defined source columns for Flags
         GanttDescendants:"D", GanttAncestors:"A", // Defines source columns for Dependencies
         GanttLeft:"2", GanttRight:"0",      // At least two units will be let empty on both sides (no Exclude applied here)
         GanttMin:"1/1/1990", GanttMax:"1/1/2040", // Limit dates for input and display
         MinWidth:"450",      // Minimal width of the column will be 450 pixels
         GanttDataUnits:"h",  // All lengths in input data XML (like Dependency lags) are in hours
         GanttDataModifiers:"m:1/60,h:1,d:8,w:40", // Modifiers that can be used in Dependency lag values to multiply the value to get hour count
         GanttEndLast:"0", // All the end dates are set exactly and not as the last unit
         GanttStrict:"1",  // Forces first tasks to start on base date and all other to start immediately when possible
         GanttCorrectDependencies:"2", // Ask to correct dependencies after main task move or resize or dependency change
         GanttCorrectDependenciesFixed:"0", // Can move also the changed task when automatically correcting dependencies
         GanttCheckExclude:"2", // Ask to move task if it starts on holiday after resize or move
         GanttBase:"5/14/2008 9:00", // Base project date, all the project should start after this date
         GanttBaseProof:"1", // The tasks cannot be moved or created before GanttBase
         GanttBackground:"M#1/1/2008#5", // Highlights these dates in chart (weekends and month ends), some zoom levels change this setting
         GanttResourcesAssign:"4", // Shows resources menu with float number inputs
         GanttResourcesExtra:"3",  // Both extra price per task and per resource are permitted
         GanttFormat:"$<span style='color:#77F'>*P*</span> *R*", // Formats the text next to main task
         //GanttMainTip:"*id*. *N1*, *N2* <span style='color:#F77'>(main bar)</span><div style='padding-top:5px;padding-bottom:5px;font-weight:bold;'>*Start* - *End*</div>*Duration* hours, *C* completed<div style='padding-top:5px;'><b>*L*</b> hours reserve</div><div style='padding-top:5px;'>*Text*</div>", // Specifies tooltip shown for main bar only
         GanttMilestoneTip:"*id*. *N1*, *N2* <span style='color:#F77'>(milestone)</span><div style='padding-top:5px;font-weight:bold;'>*Start*</div><div style='padding-top:5px;'><b>*L*</b> hours reserve</div><div style='padding-top:5px;'>*Text*</div>", // Specifies tooltip shown for milestone only
         GanttFlowTip:"*id*. *N1*, *N2* <span style='color:#F77'>(*Index*. flow bar)</span><div style='padding-top:5px;padding-bottom:5px;font-weight:bold;'>*Start* - *End*</div>*Duration* hours<div style='padding-top:5px;'>*Text*</div>", // Specifies tooltip shown for flow bar only
         GanttFlagsTip:"*Start* - *Text*", // Specifies tooltip shown for flag only

         GanttCalendar:"T", // Column with custom calendars
         GanttExclude:"Special", // Global calendar - the excluded dates are not used for Gantt calculations and behaves like they don't exist at all
         GanttHideExclude:"0", // By default are the Excluded dates in global calendar shown in chart, it can be changed by a user
         GanttAvailabilityExclude:"0", // The resources chart is not rounded to the excluded dates
      
         GanttZoom:"weeks and days" // Predefine zoom level name
         }
      ],

   // --- Gantt Zoom defines zoom levels definition ---
   // The individual levels predefine various Gantt zoom settings 
   // GanttUnits and GanttWidth specify the zooming size, to GanttUnits are all the dates rounded for display and drag 
   // GanttChartRound specifies rounding of first and last date in the chart 
   // Some zoom levels changes GanttBackground to mark different units 
   // GanttHeader1 specifies the dates shown in the first line in Gantt header 
   // GanttHeader2 and possibly also 3,4,5 specify next lines in Gantt header 
   // The ...Ex values are chosen when Exclude is hidden, they are appropriate only for the actual Exclude dates (days and hours)
   Zoom: [
      { Name:"years and halves", GanttUnits:"M6", GanttChartRound:"y", GanttWidth:"18", GanttWidthEx:"76", GanttBackground:";y#1/1/2008",
         GanttHeader1:"y#yyyy", GanttHeader2:"M6#MMMMMM" },
      { Name:"years and quarters", GanttUnits:"M3", GanttChartRound:"y", GanttWidth:"24", GanttWidthEx:"101", GanttBackground:";y#1/1/2008", 
         GanttHeader1:"y#yyyy", GanttHeader2:"M3#MMMMM" },
      { Name:"halves and months", GanttUnits:"M", GanttChartRound:"y", GanttWidth:"18", GanttWidthEx:"76", GanttBackground:";M6#1/1/2008", 
         GanttHeader1:"M6#MMMMMM. yyyy", GanttHeader2:"M#MM" },
      { Name:"quarters and months", GanttUnits:"M", GanttChartRound:"M6", GanttWidth:"28", GanttWidthEx:"118", GanttBackground:";M3#1/1/2008", 
         GanttHeader1:"M3#MMMMM. yyyy", GanttHeader2:"M#MMM" },
      { Name:"months and weeks", GanttUnits:"d", GanttChartRound:"M", GanttWidth:"3", GanttWidthEx:"12.6", GanttBackground:";M#1/1/2008", 
         GanttHeader1:"M#MMM yyyy", GanttHeader2:"w#d." },
      { Name:"months and days", GanttUnits:"d", GanttChartRound:"M", GanttWidth:"8", GanttWidthEx:"33.6",
         GanttHeader1:"M#MMMM yyyy", GanttHeader2:"d#'<div style=\"font:8px Arial;\">'DDDDDD'<br/>'DDDDDDD'</div>'",GanttHeaderHeight2:"20" },
      { Name:"weeks and days", GanttUnits:"d", GanttChartRound:"w", GanttWidth:"18", GanttWidthEx:"76",
         GanttHeader1:"w#'<span style=\"color:red;font-size:8px;\">week 'ddddddd'</span>' MMMM yyyy", GanttHeader2:"d#%d", GanttHeader3:"d#ddddd" },
      { Name:"days and quarters", GanttUnits:"h", GanttChartRound:"w", GanttWidth:"3", GanttWidthEx:"9",
         GanttHeader1:"d#dd MMM yyyy", GanttHeader2:"d#dddd", GanttHeader3:"h6#HH", GanttHeaderRound3:"1" },
      { Name:"days and hours", GanttUnits:"h", GanttChartRound:"d", GanttWidth:"8", GanttWidthEx:"24",
         GanttHeader1:"d#dddd dddddd MMMM yyyy", GanttHeader2:"h#'<div style=\"font:8px Arial;\">'HHHH'<br/>'HHHHH'</div>'", GanttHeader2Ex:"h#HH" },
      { Name:"halves and hours", GanttUnits:"h", GanttChartRound:"d", GanttWidth:"19", GanttWidthEx:"25",
         GanttHeader1:"h12#dddd dddddd MMMM yyyy tt", GanttHeader1Ex:"d#dddd dddddd MMMM yyyy", GanttHeader2:"h#HH" },
      { Name:"hours and quarters", GanttUnits:"h", GanttChartRound:"d", GanttWidth:"60", GanttBackground:"w#1/5/2008~1/7/2008; h#00:00", 
         GanttHeader1:"h3#dddd dddddd MMMM yyyy", GanttHeader2:"h#HH 'hour'", GanttHeader3:"m15#mm" },
      { Name:"hours and 5 minutes", GanttUnits:"m5", GanttChartRound:"h", GanttWidth:"18", GanttBackground:"w#1/5/2008~1/7/2008; h#00:00", 
         GanttHeader1:"h#dddd dddddd MMMM yyyy", GanttHeader2:"h#HH 'hour'", GanttHeader3:"m5#mm" },
      { Name:"hours and minutes", GanttUnits:"m", GanttChartRound:"h", GanttWidth:"8", GanttBackground:"m15#00:00; h#00:00",
         GanttHeader1:"h#dddd dddddd MMMM yyyy, '<span style=\"color:red;\">'HH 'hour</span>'",
         GanttHeader2:"m#'<div style=\"font:8px Arial;\">'mmmm'<br/>'mmmmm'</div>'" },
      { Name:"halves and minutes", GanttUnits:"m", GanttChartRound:"h", GanttWidth:"12", GanttBackground:"m15#00:00; h#00:00",
         GanttHeader1:"m30#dddd dddddd MMMM yyyy, '<span style=\"color:red;\">'HH:mm '</span>'",
         GanttHeader2:"m#'<div style=\"font:8px Arial;\">'mmmm'<br/>'mmmmm'</div>'" },
      { Name:"quarters and minutes", GanttUnits:"m", GanttChartRound:"h", GanttWidth:"18", GanttBackground:"m15#00:00; h#00:00",
         GanttHeader1:"m15#dddd dddddd MMMM yyyy, '<span style=\"color:red;\">'HH:mm '</span>'", GanttHeader2:'m#mm' },
      { Name:"5 minutes and minutes", GanttUnits:"m", GanttChartRound:"m15", GanttWidth:"36", GanttBackground:"m5#00:00; h#00:00",
         GanttHeader1:"m5#dddd d MMM yyyy, '<span style=\"color:red;\">'HH:mm'</span>'", GanttHeader2:"m#mm" },
      { Name:"minutes and 15 seconds", GanttUnits:"s15", GanttChartRound:"m15", GanttWidth:"18", GanttBackground:"m#00:00; h#00:00",
         GanttHeader1:"m2#dddd d MMM yyyy", GanttHeader2:"m#HH:mm", GanttHeader3:"s15#ss" },
      { Name:"minutes and 5 seconds", GanttUnits:"s5", GanttChartRound:"m15", GanttWidth:"18", GanttBackground:"m#00:00; h#00:00",
         GanttHeader1:"m#dddd dddddd MMMM yyyy", GanttHeader2:"m#HH:mm", GanttHeader3:"s5#ss" },
      { Name:"minutes and seconds", GanttUnits:"s", GanttChartRound:"m5", GanttWidth:"8", GanttBackground:"s15#00:00; m#00:00",
         GanttHeader1:"m#dddd dddddd MMMM yyyy, '<span style=\"color:red;\">'HH:mm 'minute</span>'",
         GanttHeader2:"s#'<div style=\"font:8px Arial;\">'ssss'<br/>'sssss'</div>'" },
      { Name:"halves and seconds", GanttUnits:"s", GanttChartRound:"m5", GanttWidth:"12", GanttBackground:"s15#00:00; m#00:00",
         GanttHeader1:"s30#dddd d MMM yyyy, '<span style=\"color:red;\">'HH:mm 'minute</span>'",
         GanttHeader2:"s#'<div style=\"font:8px Arial;\">'ssss'<br/>'sssss'</div>'" },
      { Name:"quarters and seconds", GanttUnits:"s", GanttChartRound:"m", GanttWidth:"18", GanttBackground:"s15#00:00; m#00:00",
         GanttHeader1:"s15#dddd dddddd MMMM yyyy, '<span style=\"color:red;\">'HH:mm:ss'</span>'", GanttHeader2:"s#ss" },
      { Name:"5 seconds and seconds", GanttUnits:"s", GanttChartRound:"s15", GanttWidth:"36", GanttBackground:"s5#00:00; m#00:00",
         GanttHeader1:"s5#dddd d MMM yyyy, '<span style=\"color:red;\">'HH:mm'</span>'", GanttHeader2:"s#ss" },
      { Name:"seconds and 100 ms", GanttUnits:"ms100", GanttChartRound:"s2", GanttWidth:"9", GanttBackground:"s#00:00; m#00:00",
         GanttHeader1:"s2#dddd dddddd MMMM yyyy", GanttHeader2:"s#HH:mm:ss", GanttHeader3:"ms100#%f" },
      { Name:"seconds and 100 ms 2", GanttUnits:"ms100", GanttChartRound:"s", GanttWidth:"60", GanttBackground:"s#00:00; m#00:00",
         GanttHeader1:"s#dddd dddddd MMMM yyyy", GanttHeader2:"ms100#HH:mm:ss.'<span style=\"color:red;\">'f'</span>'" },
      { Name:"100 ms and 10 ms", GanttUnits:"ms10", GanttChartRound:"ms100", GanttWidth:"10", GanttBackground:"ms100#00:00; s#00:00",
         GanttHeader1:"ms100#ddd d MMM yyyy", GanttHeader2:"ms100#HH:mm:ss.'<span style=\"color:red;\">'f'</span>'", GanttHeader3:"ms10#ffff" },
      { Name:"100 ms and 10 ms 2", GanttUnits:"ms10", GanttChartRound:"ms100", GanttWidth:"65", GanttBackground:"ms100#00:00; s#00:00",
         GanttHeader1:"ms100#dddd dddddd MMMM yyyy",  GanttHeader2:"ms10#HH:mm:ss.'<span style=\"color:red;\">'ff'</span>'" },
      { Name:"10 ms and ms", GanttUnits:"ms", GanttChartRound:"ms10", GanttWidth:"11", GanttBackground:"ms10#00:00; ms100#00:00",
         GanttHeader1:"ms10#ddd d MMM yyyy", GanttHeader2:"ms10#HH:mm:ss.'<span style=\"color:red;\">'ff'</span>'", GanttHeader3:"ms#fffff" },
      { Name:"10 ms and ms 2", GanttUnits:"ms", GanttChartRound:"ms10", GanttWidth:"70", GanttBackground:"ms10#00:00; ms100#00:00",
         GanttHeader1:'ms10#dddd dddddd MMMM yyyy', GanttHeader2:"ms#HH:mm:ss.'<span style=\"color:red;\">'fff'</span>'" },
      { Name:"10 ms and ms 3", GanttUnits:"ms", GanttChartRound:"ms10", GanttWidth:"180", GanttBackground:"ms10#00:00; ms100#00:00",
         GanttHeader1:'ms#dddd dddddd MMMM yyyy', GanttHeader2:"ms#HH:mm:ss.'<span style=\"color:red;\">'fff'</span>'" }
      ],

   // --- Defines all calendars (excluded dates) available in grid ---
   Calendars: [
      { Name:"Standard", Exclude:"d#18:00~9:00; d#13:00~14:00#1; w#1/5/2008~1/7/2008#2;" },
      { Name:"24 hours", Exclude:"" },
      { Name:"Night shift", Exclude:"d#8:00~23:00; d#3:00~4:00#1; w#1/5/2008 8:00~1/7/2008 8:00#2;" },
      { Name:"Special", Exclude:"d#18:00~9:00; d#13:00~14:00#1; w#1/5/2008~1/7/2008#2; 5/28/2008~5/29/2008#3" }
      ],

   // --- Column captions ---
   Header: { 
      id:"ID", N1:"Task", N2:"Section", S:"Start", E:"End", C:"Com<br>plete", U:"Dura<br>tion", NI:"Information", P:"Price",
      S1:"Min start", S2:"Max start", E1:"Min end", E2:"Max end", L:"Slack<br>(critical path)",
      F:"Real flow", FI:"Real flow<br>information", D:"Descen<br>dants", A:"Ances<br>tors",
      M:"Flags", I:"Flag Info", R:"Resources", G:"Gantt", GNoColor:"0", NoEscape:"1",
      SortIcons:"2" // Hides unused sort icons 
      },

   Solid: [

      // --- Defines the first top toolbar with combos to choose grouping, zoom and calendars ---
      {
         Kind:"Group", id:"Group", Space:"0", Panel:"0", Cells:"List,Zoom,Ex,HidEx,Cal",
        
         ListLeft:"5",
         ListHtmlPrefix:"<b>Group by <span style='color:blue;'>", ListHtmlPostfix:"</span></b>",
  			List:"|none|Task|Complete Task|Complete|Start|End",
         Cols:"||N1|C,N1|C|S|E",
			ListWidth:"108",
			
         ZoomType:"SelectGanttZoom",
         ZoomHtmlPrefix:"<b>Zoom to <span style='color:blue;'>", ZoomHtmlPostfix:"</span></b>",
         ZoomLeft:"5",
         ZoomWidth:"170",
			
         ExLabel:"<b style='color:blue;'>Holidays</b>", ExWidth:"50", ExLeft:"5",
         ExType:"Select", ExOnClickSideDefaults:"Grid.ShowGanttCalendars(Row,Col)",
         ExFormula:"Grid.Cols.G.GanttExclude",
         ExOnChange:"Grid.ChangeExclude(Value);", ExUndo:"1",
         ExTip:"Global calendar for the whole project",

         HidExType:"Bool", HidExNoColor:"1", HidExLeft:"5", HidExCanFocus:"0",
         HidExLabelRight:"Hide holidays",
         HidExFormula:"Grid.Cols.G.GanttHideExclude",
         HidExOnChange:"Grid.SetHideExclude(Value)",
         HidExCanEditFormula:"gantthasexclude()!=0",
         HidTip:"Hides dates excluded by the global calendar",

         CalType:"Bool", CalNoColor:"1", CalLeft:"5", CalCanFocus:"0", CalCanEdit:"1",
         CalLabelRight:"Custom calendars",
         CalFormula:"Grid.Cols.G.GanttCalendar",
         CalOnChange:"Grid.ChangeExclude(Value?'T':'','GanttCalendar'); if(Value) Grid.ShowCol('T'); else Grid.HideCol('T');",
         CalTip:'Permits custom calendars for individual tasks'

         },

      // --- Defines the second top toolbar with Baseline, Finish date, critical path and dependency violation checking ---
      {
         Kind:"Topbar2", id:"Project", Space:"0", Panel:"0", Cells:"Base,Finish,Crit,Dep",
            
         BaseType:"Date", BaseCanEdit:"1", BaseWidth:"100", BaseUndo:"1", BaseLeft:"5",
         BaseLabel:"Baseline",
         BaseFormat:"ddd M/d/yyyy, '<span style=\"color:blue\">'HH'</span>'",
         BaseEditFormat:"M/d/yyyy HH",
         BaseFormula:"Grid.GetGanttBase()",
         BaseOnChange:"Grid.SetGanttBase(Value,2);",
         BaseHtmlPrefixFormula:"Grid.Cols.G.GanttBase===''?'<span style=\"color:gray;\">':'<span>'",
         BaseHtmlPostfix:"</span>",
         BaseTip:"Starting date of the whole project.<br>No task should start before it.<br>It is also used when correcting dependencies.",
              
         FinishType:"Date", FinishCanEdit:"1", FinishWidth:"100", FinishUndo:"1", FinishLeft:"5",
         FinishLabel:"Finish date",
         FinishFormat:"ddd M/d/yyyy, '<span style=\"color:blue\">'HH'</span>&nbsp;'",
         FinishEditFormat:"M/d/yyyy HH",
         FinishFormula:"Grid.GetGanttFinish()",
         FinishOnChange:"Grid.SetGanttFinish(Value);",
         FinishHtmlPrefixFormula:"Grid.Cols.G.GanttFinish===''?'<span style=\"color:gray;\">':'<span>'",
         FinishHtmlPostfix:"</span>",
         FinishTip:"Finish date of the whole project.<br>If grayed, it is calculated from the last task.<br>It is used to calculate critical path.",

         CritType:"Bool", CritNoColor:"1", CritCanEdit:"1", CritLeft:"5", CritCanFocus:"0",
         CritLabelRight:"Show <b style='color:blue;'>critical path</b> only",
         CritOnChange:"Grid.SetFilter('Crit',Value?'L!==\"\" && L<=Grid.Cols.G.GanttMinSlack && C!=100':'')",
              
         DepType:"Select",
         DepDefaults:"|Ignore problems|Auto correct problems|Alert and confirm problems",
         DepFormula:"Grid.GetDefaultsValue(Row,Col,Grid.Cols.G.GanttCorrectDependencies)",
         DepOnChange:"var v=Grid.GetDefaultsIndex(Row,Col,Value);Grid.Cols.G.GanttCorrectDependencies=v;Grid.Cols.G.GanttCheckExclude=v;Grid.SaveCfg();",
         DepTip:"If the dependent tasks will be updated after some task move or resize",
         DepWidth:"130",
         DepLeft:"5"
         },

      // --- Defines the first bottom toolbar with resources filters and charts ---
      {
         Kind:"Toolbar1", Space:"4", Cells:"Resources,Use,Avail,Free,Err,Empty,Dep", Panel:"0",
         ResourcesType:"SelectGanttResources",
         ResourcesHtmlPrefix:"<b>Show <span style:'color:blue;'>", ResourcesHtmlPostfix:"</span></b>",
         ResourcesEmptyValue:"all resources",
         ResourcesLeft:"5",
         ResourcesWidth:"120",
          
         UseType:"Bool", UseNoColor:"1", UseCanEdit:"1", UseLeft:"5", UseCanFocus:"0",
         UseLabelRight:"Used resources", Use:"1",
         UseOnChange:"Grid.Def.Resource.GGanttAvailability = (Row.Avail?',N2#3':'') + (Row.Use?',N2#1':'') + (Row.Use&&Row.Avail?',N2#8':'') + (Row.Free?',N2#5':'') + (Row.Err?',N2#6':''); if(!Row.Avail&&!Row.Free&&!Row.Err) { var F = Grid.GetRows(Grid.Foot); Grid.StartUpdate(); for(var i=0;i<F.length;i++) if(Value) Grid.ShowRow(F[i]); else Grid.HideRow(F[i]); Grid.EndUpdate(); } else Grid.RefreshGantt();",
         AvailType:"Bool", AvailNoColor:"1", AvailCanEdit:"1", AvailLeft:"5", AvailCanFocus:"0",
         AvailLabelRight:"Available resources", Avail:"1",
         AvailOnChange:"Grid.Def.Resource.GGanttAvailability = (Row.Avail?',N2#3':'') + (Row.Use?',N2#1':'') + (Row.Use&&Row.Avail?',N2#8':'') + (Row.Free?',N2#5':'') + (Row.Err?',N2#6':''); if(!Row.Use&&!Row.Free&&!Row.Err) { var F = Grid.GetRows(Grid.Foot); Grid.StartUpdate(); for(var i=0;i<F.length;i++) if(Value) Grid.ShowRow(F[i]); else Grid.HideRow(F[i]); Grid.EndUpdate(); } else Grid.RefreshGantt();",
         FreeType:"Bool", FreeNoColor:"1", FreeCanEdit:"1", FreeLeft:"5", FreeCanFocus:"0",
         FreeLabelRight:"Free resources", Free:"0",
         FreeOnChange:"Grid.Def.Resource.GGanttAvailability = (Row.Avail?',N2#3':'') + (Row.Use?',N2#1':'') + (Row.Use&&Row.Avail?',N2#8':'') + (Row.Free?',N2#5':'') + (Row.Err?',N2#6':''); if(!Row.Use&&!Row.Avail&&!Row.Err) { var F = Grid.GetRows(Grid.Foot); Grid.StartUpdate(); for(var i=0;i<F.length;i++) if(Value) Grid.ShowRow(F[i]); else Grid.HideRow(F[i]); Grid.EndUpdate(); } else Grid.RefreshGantt();",
         ErrType:"Bool", ErrNoColor:"1", ErrCanEdit:"1", ErrCanFocus:"0", ErrLeft:"5",
         ErrLabelRight:"Resources errors", Err:"0",
         ErrOnChange:"Grid.Def.Resource.GGanttAvailability = (Row.Avail?',N2#3':'') + (Row.Use?',N2#1':'') + (Row.Use&&Row.Avail?',N2#8':'') + (Row.Free?',N2#5':'') + (Row.Err?',N2#6':''); if(!Row.Use&&!Row.Avail&&!Row.Free) { var F = Grid.GetRows(Grid.Foot); Grid.StartUpdate(); for(var i=0;i<F.length;i++) if(Value) Grid.ShowRow(F[i]); else Grid.HideRow(F[i]); Grid.EndUpdate(); } else Grid.RefreshGantt();",
          
         EmptyRelWidth:"1", EmptyType:"Html",
         DepFormula:"ganttdependencyerrors(null,1)", DepOnClick:"CorrectAllDependencies", DepTip:"Click to correct the dependencies" 
         }                  
      ],
   
   // --- Summary row for all tasks ---   
   Foot: [

      { id:"-1", Def:"Group", N1:"Summary", N2:"Summary", GGanttEdit:"" },
      {  // Header of sub table with column captions
        Kind:"Header", 
          id:"-2", idVisible:"0", SortIcons:"0", CanPrint:"1",
          N1:"Type", N2:"Resource", G:"Resources usage", GOnClick:"ZoomIn", GNoColor:"0",
          S:"Unit price", E:"Availability", U:"Peak", C:"Type", D:"Total", A:"Price",
          S1:"", S2:"", E1:"", E2:"", NI:"", T:"", F:"", FI:"", R:"", P:"", M:"", I:"", L:""      
        },
      // Header of sub table with column captions
      { id:"-3", Def:"Resource", N2:"Support" },
      { id:"-4", Def:"Resource", N2:"Sales" },
      { id:"-5", Def:"Resource", N2:"Management" },
      { id:"-6", Def:"Resource", N2:"Development" },
      { id:"-7", Def:"Resource", N2:"Material", Height:"40" }           
    ],
   
   // --- Resources definition ---
   Resources: [
      { Name:"Sales", Price:"20", Type:"1", Availability:"3" },
      { Name:"Support", Price:"30", Type:"1", Availability:"5" },
      { Name:"Management", Price:"37", Type:"1", Availability:"w#1/4/2011~1/7/2011#1" },
      { Name:"Development", Price:"40", Type:"1", Availability:"20;5/26/2008~6/7/2008#-8" },
      { Name:"Material", Price:"1", Type:"2", Availability:"15;w#5/20/2008~6/4/2008#20" }           
    ],
   
   Lang: {
      // --- Colors the separators to be better visible, there must be also set Cfg NoFormatEscape for it ---
      Format : {
         ValueSeparatorHtml:"<b style='color:red;'>; </b>",
         RangeSeparatorHtml:"<b style='color:red;'> ~ </b>"
         }
      },

   // --- Defines the second toolbar as standard TreeGrid toolbar ---
   Toolbar: { 
      Kind:"Toolbar2" 
      }
   }
