簡易購物網站
===

目的：做一個賣書和CD的購物網站，其他不限

環境：WinNMP  

_PHP_MySqli.rar、bootstrap-5.1.3-dist.rar，一個是關於資料庫的處理函式，另一個關於排版的。和圖片檔都要解壓縮放在WWW資料夾裡，  
其他.php檔都是程式碼，也是放在WWW裡。  

## 程式碼部分節錄

### index.php
![index](https://github.com/user-attachments/assets/d2eacfe2-6f01-41ad-b716-0c927c5c7c09)  
  網站基礎功能，如：回到首頁、登入登出、搜尋框、會員資料頁面、購物車  
  商品展示：隨機展示商品、依商品分類展示、排序商品  

### function.php / 資料庫存取增減
![image](https://github.com/user-attachments/assets/ba2a0c71-0313-4472-b8ac-42f513bcbfd4)  
  存取商品資料並排序、存取會員資料、修改購物車、存取訂單等等  

### db_connect.php / 資料庫使用
![image](https://github.com/user-attachments/assets/e0a43279-fafc-435d-a877-755d899172df)  

![image](https://github.com/user-attachments/assets/223c207c-4f7d-4139-bac4-d6df5c939a5a)  

### login.php & logout.php
![image](https://github.com/user-attachments/assets/91016c6c-1869-4bf4-92f4-84dd5f04aadf)  
 管理登入會員、註冊會員和登出時狀態reset  

### Receive.php
![image](https://github.com/user-attachments/assets/daa34131-5d14-4d3d-b635-c0eaf44c8c84)  
 處理操作購物車的回覆

### settlement.php
![image](https://github.com/user-attachments/assets/94e244bd-d1eb-46f9-8874-97702ccbc3c5)  
 購物車清單呈現、勾選要付款的商品、計算總金額  

### checkout.php
![image](https://github.com/user-attachments/assets/d3586d96-8911-42d4-a95c-d5ab3274407c)  
 訂單明細、獲取買家資料  

### member.php
![image](https://github.com/user-attachments/assets/1a3bab85-6062-4188-a2cd-62204cd2e34d)  
 功能選單：修改密碼、修改會員資料、訂單查詢  

### seller.php
![image](https://github.com/user-attachments/assets/855d9c80-6611-42b3-a924-85f94a09158f)  
 功能選單：上架新品、修改庫存、訂單狀態更新  

## 資料庫
![image](https://github.com/user-attachments/assets/6702578c-0f06-47e1-a0c0-a97f75fdcafd)  

### 購物車
![image](https://github.com/user-attachments/assets/f0ffda66-19c0-42e4-8d4b-b3de635c8a03)  
  每筆購物車資料的ID、擁有該購物車資料的會員ID、商品ID、商品名稱、商品單價、該筆購物車資料狀態（0代表已經被刪除或清空）  
### 會員
![image](https://github.com/user-attachments/assets/15c41df9-25a0-4377-b0ad-f2e8a8c1014e)  
  會員ID、帳號、密碼（沒有加密）、名字、電子郵件  

### 商品
![image](https://github.com/user-attachments/assets/d09c810e-1306-4c72-b1d4-ab381277cc3c)  
 商品ID、名稱、單價、庫存、分類、作者、出版社  

### 訂單
![image](https://github.com/user-attachments/assets/88d95563-f5a7-4a26-ac94-c9f72683b97f)  
 訂單ID、用戶歸屬和ID、商品ID和數量、訂購人的地址、電話、電子郵件，是否付款、是否送達、評分  
 
## 網站功能展示
在localhost展示，Demo影片：https://youtu.be/Dk5k_zAaQeg

![首頁](htps://github.com/user-attachments/assets/7454c987-af98-4a50-b415-4641417d95b7)
![會員修改密碼](https://github.com/user-attachments/assets/e8650d32-6cee-4126-abd7-823bc4978747)  
![搜尋結果呈現](https://github.com/user-attachments/assets/1276d197-5976-455f-b264-062a917ad3a3)  
![價錢由低到高排序](https://github.com/user-attachments/assets/c8d6bdb3-3f2a-42c7-83ee-6a3a94afa783)  
![購物車](https://github.com/user-attachments/assets/d5cdb9d9-030a-4143-bab3-1c6d61067297)  
![結帳頁面](https://github.com/user-attachments/assets/0681cade-c3a0-44b0-b0d7-8e3af40f1448)
![會員訂單追蹤](https://github.com/user-attachments/assets/1a00d0e4-c437-44a3-8751-b37e9aa0bec5)
![賣家頁面](https://github.com/user-attachments/assets/efc58913-278e-429f-9d53-2a8069be1a54)


