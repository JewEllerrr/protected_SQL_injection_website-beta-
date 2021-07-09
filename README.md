# protected_SQL_injection_website-beta-
Лабораторная работа. Разработка безопасного веб-приложения.

За вспомогательный инструмент для работы с сервером и БД была взята программная среда Open Server Panel.
Клиентская часть была реализована с помощью шаблонизатора Smarty.

Реализованный функционал: 
+ возможность просматривать/добавлять/удалять/изменять постояльцев;
+ возможность просматривать/добавлять/удалять/изменять персонал;
+ возможность просматривать/добавлять/удалять/изменять постояльцев в
номера;
+ возможность просматривать/добавлять/удалять/изменять услуги.

В системе также существует разделение доступа: среди пользователей есть admin, который может просматривать и редактировать данные всех пользователей. 
Также есть персонал, который может только просматривать, редактировать данные о клиентах.
При работе приложения выполняется журналирование действий пользователей.

Приложение соответствует не всем требованиям стандарта OWASP Application Security Verification Standard 4.0. 
Единственная атака из модели угроз, которую злоумышленник не сможет реализовать — это внедрение SQL-инъекции.
