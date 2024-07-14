const express = require("express");
const http = require("http");
const axios = require("axios");
const app = express();
const bodyParser = require("body-parser");
const moment = require("moment");

const port = 3000;
const hostname = "localhost";

app.use(bodyParser.json());

const server = http.createServer(app);

const consumerKey = 'APGAQQOJMAWhmut7VYwatBtNsJNZAM6Ne6RNKIXFMtHurnTN';
const consumerSecret = 'kAoQVCjpCV5CZT0rbzi1xtwq8s0Yz9YRE1nTtFzVIoiGi7VyqrXzlMVmFtmY7aLI';

// Function to get the access token
const getAccessToken = () => {
    const auth = "Basic " + Buffer.from(consumerKey + ":" + consumerSecret).toString("base64");
    const url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    return axios.get(url, {
        headers: {
            "Authorization": auth
        }
    }).then(response => response.data.access_token);
};

app.get("/", (req, res) => {
    res.send("Mpesa Daraja API");
    const timestamp = moment().format("YYYYMMDDHHmmss");
    console.log(timestamp);
    console.log("Root endpoint hit");
});

// ACCESS TOKEN ROUTE
app.get("/access_token", (req, res) => {
    console.log("Access token route hit");
    getAccessToken()
        .then(accessToken => {
            res.send("Your access token is " + accessToken);
        })
        .catch(error => {
            console.error("Error getting access token:", error);
            res.status(500).send("Failed to get access token.");
        });
});

// STK PUSH ROUTE
app.get("/stkpush", (req, res) => {
    console.log("STK push route hit");
    getAccessToken()
        .then(accessToken => {
            const url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
            const auth = "Bearer " + accessToken;
            const timestamp = moment().format("YYYYMMDDHHmmss");
            const password = Buffer.from(
                "174379" + // BusinessShortCode
                "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919" + // LipaNaMpesaOnline Shortcode
                timestamp
            ).toString("base64");

            return axios.post(url, {
                BusinessShortCode: "174379",
                Password: password,
                Timestamp: timestamp,
                TransactionType: "CustomerPayBillOnline",
                Amount: "1", // Set a test amount
                PartyA: "254724723349", // Replace with your phone number
                PartyB: "174379",
                PhoneNumber: "254724723349", // Replace with your phone number
                CallBackURL: "https://cc15-105-161-198-85.ngrok-free.app/callback",
                AccountReference: "Recycle",
                TransactionDesc: "Payment for test"
            }, {
                headers: {
                    "Authorization": auth
                }
            });
        })
        .then(response => {
            console.log("Request is successful. Please enter Mpesa PIN to complete the transaction");
            console.log("Response:", response.data); // Log the entire response data
            res.status(200).json(response.data);
        })
        .catch(error => {
            console.error("STK push failed:", error.response ? error.response.data : error.message);
            res.status(500).send("STK push failed.");
        });
});

// CALLBACK ROUTE
app.post("/callback", (req, res) => {
    console.log("Callback received:", req.body);
    // Handle the callback data here
    res.status(200).send("Callback received");
});

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});
