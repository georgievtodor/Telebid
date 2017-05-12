const express = require('express'),
    session = require('express-session'),
    bodyParser = require('body-parser'),
    mysql = require('mysql'),
    jsdom = require('jsdom'),
    { JSDOM } = jsdom,
    app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(session({ secret: 'James Bond 007' }));

app.listen(3001);

console.log('Server is running on port: 3001');

let connection = mysql.createConnection({
    host: 'localhost',
    user: 'user',
    password: 'asdf42',
    database: 'wordpress',
    multipleStatements: true
});

connection.connect(function (err) {
    if (err) {
        console.error('error connecting: ' + err.stack);
        return;
    }

    console.log('connected as id ' + connection.threadId);
});


require('./EVDB.js');
// let query = "INSERT INTO `google_maps_markers` (`id`, `name`, `adress`, `lat`, `lng`) VALUES (NULL, 'test1', 'test1', '123.3', '321.2'); INSERT INTO `google_maps_markers` (`id`, `name`, `adress`, `lat`, `lng`) VALUES (NULL, 'test2', 'test2', '123.3', '321.2');";
// let query = 'SELECT 1; SELECT 2;'
// connection.query(query, function (error, results, fields) {
//     if (error) {
//         console.log(error);
//     }
//     console.log(results);
// })

let queryHolder = "INSERT INTO `google_maps_markers` (`id`, `name`, `adress`, `lat`, `lng`)";
let query = queryHolder;

for (let i = 1; i <= 60; i += 1) {
    let oArgs = {
        app_key: "ZF8DQx6LN9zKpNPp",
        date: "Last Week",
        page_size: 250,
        page_number: i
    };

    EVDB.API.call("/events/search", oArgs, function (oData) {
        // let query = "INSERT INTO `google_maps_markers` (`id`, `name`, `adress`, `lat`, `lng`, `type`) VALUES (NULL, 'asdff', 'asdfff', '123.3', '321.2', 'asdasd');";
        // console.log(oData.events.event[0])

        // console.log(oData.events.event[0].latitude);

        let query = ""


        let events = oData.events.event;

        for (let i = 0; i < events.length; i += 1) {
            let event = events[i];

            let name = event.country_name;
            let adress = event.region_name;
            let lat = event.latitude;
            let lng = event.longitude;

            if (!lat || !lng || !name || !adress) {
                continue;
            }
            console.log(name, adress, lat, lng);

            query += "INSERT INTO `google_maps_markers` (`id`, `name`, `adress`, `lat`, `lng`) VALUES (NULL, '" + name + "', '" + adress + "', '" + lat + "', '" + lng + "'); ";
            

        }

        connection.query(query, function (error, results, fields) {
            if (error) {
                console.log(error);
            }
        })

        query = "";
    });
}



