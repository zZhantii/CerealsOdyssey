export class Order {
    constructor(order_id, user_id, date, cardNumber, status, price, totalDiscount, discount_value) {
        this.order_id = order_id;
        this.user_id = user_id;
        this.date = date;
        this.cardNumber = cardNumber;
        this.status = status;
        this.price = price;
        this.totalDiscount = totalDiscount;
        this.discount_value = discount_value;
    }
}