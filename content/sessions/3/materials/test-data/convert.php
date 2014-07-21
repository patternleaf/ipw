<?php
// $t = file_get_contents('STEO.txt');
// $json = '['.str_replace("\n", ',', $t).']';
// file_put_contents('STEO.json', $json);
//
// $php = '$data = '.json_decode($json).';';
// file_put_contents('STEO.php', $php);


$json = '{
	"accessLevel": "public",
	"accrualPeriodicity": "Continuously updated",
	"bureauCode": ["005:15"],
	"contactPoint": "ASB Secretary",
	"dataDictionary": "http://www.agcensus.usda.gov/Publications/2007/Full_Report/Volume_1,_Chapter_1_US/usappxb.pdf",
	"dataQuality": true,
	"description": "Quick Stats API is the programmatic interface to the National Agricultural Statistics Service\'s (NASS) online database containing results from the 1997, 2002, 2007, and 2012 Censuses of Agriculture as well as the best source of NASS survey published estimates. The census collects data on all commodities produced on U.S. farms and ranches, as well as detailed information on expenses, income, and operator characteristics. The surveys that NASS conducts collect information on virtually every facet of U.S. agricultural production.",
	"distribution": [{
		"accessURL": "http://quickstats.nass.usda.gov/api",
		"format": "application/json"
	}],
	"identifier": "USDA-NASS-00003",
	"issued": "2014-05-02",
	"keyword": ["African American operators", "Agriculture", "American Indian Reservation farms", "Asian operators", "Brussels sprouts", "CCC", "CRP", "Chinese cabbage", "Christmas trees", "Commodity Credit Corporation loans", "Conservation Reserve", "Data", "English walnuts", "Farmable Wetlands", "Hispanic operators", "Latino operators", "NAICS", "NASS", "North American Industry Classification System", "Pacific Island operators", "Spanish operators", "Temples", "USDA", "Valencia oranges", "Wetlands Reserve", "abandoned", "acres", "ag land", "ag services", "age", "agri-tourism", "agriculture", "alfalfa", "alfalfa seed", "almonds", "alpacas", "angora goats", "apples", "apricots", "aquaculture", "aquatic plants", "artichokes", "asparagus", "avocados", "bales", "bananas", "barley", "bedding plants", "bee colonies", "beef cow", "bees", "beets", "bell peppers", "berries", "bison", "black operators", "blackberries", "blackeyed peas", "blueberries", "boysenberries", "broccoli", "broilers", "bulbs", "bull", "burros", "bushels", "cabbage", "calves", "cantaloupes", "carrots", "cash rents", "cattle", "cauliflower", "celery", "chemicals", "cherries", "chestnuts", "chickens", "chicory", "chile", "citrus", "coffee", "collards", "combines", "conservation practices", "contract labor", "corms", "corn", "cotton", "cotton pickers", "cowpeas", "cranberries", "crop insurance", "cropland", "cucumbers", "currants", "custom hauling", "customwork", "cut flowers", "cuttings", "cwt", "daikon", "dairy products", "dates", "deer", "dewberries", "donkeys", "dry edible beans", "dry edible peas", "ducks", "durum wheat", "eggplant", "eggs", "elk", "emus", "endive", "equipment", "escarole", "ewe", "experimental farms", "farm demographics", "farm economics", "farm income", "farm operations", "farms", "feed purchased", "fertilizer", "fescue seed", "field crops", "figs", "filberts", "flaxseed", "floriculture", "flower seeds", "flowering plants", "foliage plants", "forage", "fruits", "fuels", "garden plants", "garlic", "geese", "ginseng", "goats", "government payments", "grapefruit", "grapes", "grass seed", "grazing", "green onions", "greenchop", "greenhouse", "greenhouse tomatoes", "greenhouse vegetables", "guavas", "harvested", "harvesters", "hay", "hay balers", "haylage", "hazelnuts", "herbs", "herd", "hired farm labor", "hogs", "honey", "honeydew melon", "hops", "horseradish", "horses", "idle", "institutional farms", "interest expense", "inventory", "irrigation", "kale", "kiwifruit", "kumquats", "lambs", "land in farms", "land rents", "land value", "landlord", "layers", "lemons", "lentils", "lettuce", "lima beans", "limes", "liners", "llamas", "loganberries", "macadamia nuts", "machinery value", "mangoes", "manure", "maple syrup", "meat goats", "melons", "milk cow", "milk goats", "mink", "mint", "mohair", "mules", "mushrooms", "mustard", "native Hawaiian operators", "nectarines", "noncitrus", "nonirrigated", "number sold", "nursery", "nursery stock", "nuts", "oats", "okra", "olives", "onions", "operation", "operator characteristics", "oranges", "orchards", "organic", "ostriches", "other animals", "papayas", "parsley", "passion fruit", "pasture", "peaches", "peanuts", "pears", "peas", "pecans", "pelts", "peppers", "persimmons", "pheasants", "pickles", "pigeons", "pigs", "pima cotton", "pineapples", "pistachios", "planted", "plugs", "plums", "pluots", "pomegranates", "ponies", "popcorn", "potatoes", "poultry", "pounds", "price", "primary occupation", "production contracts", "production expenses", "property tax", "proso millet", "prunes", "pullets", "pumpkins", "quail", "rabbits", "radishes", "rangeland", "raspberries", "real estate", "research farms", "rhizomes", "rhubarb", "rice", "ryegrass seed", "safflower", "sales", "seedlings", "sheep", "short rotation", "silage", "snap beans", "sod", "sorghum", "soybeans", "spinach", "spring wheat", "squab", "squash", "storage capacity", "strawberries", "sugar", "sugarbeets", "sugarcane", "sunflower seed", "sweet cherries", "sweet corn", "sweet potatoes", "tame blueberries", "tame hay", "tangelos", "tangerines", "tart cherries", "tenant", "tenure", "tobacco", "tomatoes", "tons", "tractors", "trucks", "tubers", "turkeys", "turnip greens", "turnips", "upland cotton", "utilities", "value of production", "vegetable seeds", "vegetables", "vines", "walnuts", "watercress", "watermelons", "wheat", "white operators", "wild blueberries", "wild hay", "winter wheat", "women operators", "woodland", "woody crops", "wool"],
	"landingPage": "http://www.nass.usda.gov/Quick_Stats/",
	"license": "Creative Commons Attribution",
	"mbox": "nass@nass.usda.gov",
	"modified": "2014-05-16T19:45:56.688933",
	"notes": "Quick Stats API is the programmatic interface to the National Agricultural Statistics Service\'s (NASS) online database containing results from the 1997, 2002, 2007, and 2012 Censuses of Agriculture as well as the best source of NASS survey published estimates. The census collects data on all commodities produced on U.S. farms and ranches, as well as detailed information on expenses, income, and operator characteristics. The surveys that NASS conducts collect information on virtually every facet of U.S. agricultural production.",
	"programCode": ["005:042"],
	"publisher": "National Agricultural Statistics Service, Department of Agriculture",
	"references": ["http://www.nass.usda.gov/Education_and_Outreach/Understanding_Statistics/index.asp", "http://www.nass.usda.gov/Surveys/Guide_to_NASS_Surveys/Census_of_Agriculture/index.asp"],
	"spatial": "United States",
	"theme": ["Agriculture", "Weather", "Climate", "Research"],
	"title": "Quick Stats Agricultural Database API"
}
';
ob_start();
echo '$data = ';
var_export(json_decode($json, true));
echo ';';
file_put_contents('quick-stats.php', ob_get_clean());