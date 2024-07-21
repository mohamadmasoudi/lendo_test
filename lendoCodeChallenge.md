# Lendo Code Challenge

In this code challenge you should implement a SMS driver and register order.
## Implementing SMS drivers
Suppose, we have 3 SMS provider based on restful API which if necessary, we should be able to switch between them.
You should call a thirty-party API for each driver and pass their relevant parameters.
For example: username, password, and receptor.

## Implementing order register
In this scenario, we want to register an order for a customer by checking a few constraints.
In the first, the `orders` table includes the following fields:

field            | info
:---------------|:----------
id              | primary
customer_id     | foreign key
amount          | int: between: 10000000, 12000000, 15000000, 20000000
invoice_count   | between: 6,9,12
status          | CHECK_HAVING_ACCOUNT,OPENING_BANK_ACCOUNT

And `customers` is:

field               | info
:-------------------|:----------
id                  | primary
bank_account_number | string
status              |  normal,blocked
complete_info       | true/false
mobile              | string
name                | string

### Constraints
The order can be registered if all these constraints are passed.
 - Customer required fields must be filled.
 - The customer is not be blocked.
 - The amount and invoice count must be valid. 
 - if customer has `bank_account_number` the order status must be set to `CHECK_HAVING_ACCOUNT`, otherwise it must be set to `OPENING_BANK_ACCOUNT`.
 - Finally, persist order data in database.
 
After registering order, we want to send an SMS notification to customer like this text message:

```
Dear {customer_name},
Your order has been registered successfully.
Thank you.
```

## Notes
- Please do not use any extra packages.
- Use the Laravel framework.
- Writing test(unit/feature) is an advantage.
- In tests, mock the thirty-party APIs.
- You have 24/48H to do it
- After finishing the task, please upload the code to your GitHub repository and send your repo to us.
- If you have any questions, please feel free to ask via this email address: 'm.fouladgar@lendo.ir'

Thank you in advance for your valuable time.
