## SOLID 原則與設計模式

1. 單一職責原則 (Single Responsibility Principle)

- 將業務邏輯封裝在 OrderService 中，而 OrderController 則專注於處理 HTTP 請求，這樣可以讓每個類別只負責一個主要職責。
- OrderRepository 負責所有與資料庫相關的操作

2. 開放封閉原則 (Open/Closed Principle)

- OrderService 和 OrderRepository 的方法對新的擴展開放。

3. 里氏替換原則 (Liskov Substitution Principle)

- 無

4. 介面隔離原則 (Interface Segregation Principle)

- 無

5. 依賴反轉原則 (Dependency Inversion Principle)

- 在 OrderController 中，OrderService 是通過構造函數注入的。同樣 OrderService 依賴的 OrderRepository 也是通過依賴注入。
