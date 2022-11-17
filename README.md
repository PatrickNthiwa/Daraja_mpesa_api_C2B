# **SAFARICOM DARAJA API** 
## **Introduction**
Welcome to the Safaricom API Tutorial. The main intention of this tutorial is try to explain the ins and outs of the API in more detail than the site's documentation.


$$
Ok,
$$ first, you need to open an account with them. That's pretty straight forward. They also have the option of Company management whereby you can be a member of a team. Haven't tried that out, but you can check it out. The API is designed to work exclusively over the Internet, so no need for VPN setups or IP whitelisting compared to the previous Soap API.

Safaricom APIs response status codes and error codes comply with HTTP status codes as defined in RFC 2616. You can invoke the API endpoints using REST clients like Postman or SoapUI and command line tools like Curl and Node.js. To get you started, safricom provides code samples in **curl**, Ruby, **PHP**, **Python**, **NodeJS**, and **Java!** Sample JSON responses for each APIs request have also been availed.

### **LINKS**

[C2B API](https://developer.safaricom.co.ke/Documentation)
Once you have created an account and accessed your account, you will be given access to five main menu items. Allow me to expound on some of them:

```python
1.PROFILE
```
Under profile,is where you developer login and/or your personal credentials are .You can change them.
```python
2.API'S
```
This is where you will find the list of all available APIs provided.

Now, assuming you have access to the portal, first thing you do is create an app. The app you create will determine the APIs you use e.g. if you create an app and assign it Lipa Na M-Pesa Online product only, it means that app will only apply to Lipa na M-Pesa Online API, and you will not be able to use it's keys with the M-Pesa Sandbox APIs, and vice versa. Also, beware, you need to have planned out your APIs before going live. You cannot use the same product for both B2C APIs and C2B APIs when going live. If you applied for a C2B shortcode/paybill, it will not be allowed to use the B2C API, and if you applied for a B2C shortcode, it will not be allowed to go live with a C2B API. But the C2B API and Lipa Na M-Pesa API can be used by the same App. Also beware the name of the app will be used to identify your app in the System and will be the main identifier for all enquiries about APIs from the team. The API also has a little known analytics page, where you can view the performance of your app. This is under the Your App section on the My Apps page.
```python
3.MY APPS
```
This holds a list of all applications you have created. Apps are a way of grouping APIs into a single collection for easier classification on the user's side. You shall need at least one app on the portal to use the APIs.

```python
5.DOCS
```
This is where you will find the Official site documentation.

```python
6.GO LIVE 
```
This is the link that will enable you to begin the process to take your application live. It has quite some hustle, but it’s the only way available under your control.

```python
7.FAQS
```
This is where youll find most of the frequently asked questions concerning apis on daraja
```python
8.URL MANAGEMENT
```
Under Url management is where you are given the chance to monitor your registered urls with safaricom
All M-Pesa requests (except Register URL API) are of an asynchronous nature. This means that you will not receive a result showing completion of the transaction immediately after making the request. Instead, you make the request, receive an acknowledgement, and wait for feedback via a Listener / Callback URL / Webhook (henceforth identified as the Callback URL). Thus, you first make a request, then, if your request passes all checks, you get an Acknowledgement (which is not the result of the transaction) that the request has been received for processing asynchronously. Then, after processing has completed, you get feedback via the callback URL which you need to have specified beforehand via two means: registration of the URLs on the system (used by C2B API only), or preset in your initial request (used by the other APIs). Depending on the transaction type and the outcome of the transaction, the result can either be a success or failure. So don't mistake the acknowledgement (which is the response received after you make the request) for a successful transaction.

### **C2B API**
This API is used to simulate payment requests from clients and to your API. It basically simulates a payment made from the client phone's STK/SIM Toolkit menu, and enables you to receive the payment requests in real time.

#### **C2B TRANSACTION FLOW**
```ruby
A customer initiates a payment request to your Pay Bill or Buy Goods (Till Number) from their phone. Using the Safaricom app or from M-PESA menu in the Sim Tool Kit. 
    M-PESA receives the request and validates the customers PIN, Account Balance, Pay Bill entered etc. M-PESA also checks if you have enabled External Validation for the Pay Bill or Buy Goods (Till Number) receiving the payment.

If External Validation is disabled, M-PESA completes the transaction and sends a Confirmation notification to the Confirmation URL registered. This only happens when the payment is successful.
If External Validation is enabled:
    M-PESA Holds the Funds tentatively from the customers wallet.
    M-PESA then sends a Validation request to the Validation URL registered.
    The partner validates the payment request and responds back to M-PESA.
M-PESA receives the response, processes and completes the transaction then a notification of the payment is sent to your registered confirmation URL.
M-PESA then sends an SMS notification to both the customer and Pay Bill or Buy Goods (Till Number) registered phone number.
```
![Diagram](https://images/Screenshot.png)

$$
N.B
$$
> - Use publicly available (Internet-accessible) IP addresses or domain names.
> - Do not use the words MPesa, M-Pesa, Safaricom or any of their variants in either upper or lower cases in your URLs, the system filters these URLs out and blocks them. Of course any Localhost URL will be refused.
> - Do not use public URL testers e.g. ngrok, mockbin or requestbin especially on production, they are also usually blocked by the API.
> - C2B Transaction Validation is an optional feature that needs to be activated on M-Pesa, the owner of the shortcode needs to make this request for activation to the M-Pesa Support or API Support team if they need their transactions validated before execution.

