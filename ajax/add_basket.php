<?
    //use Bitrix\Sale\DiscountCouponsManager;
    
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/local/templates/".SITE_TEMPLATE_ID."/header.php");
    CModule::IncludeModule('catalog');
    CModule::IncludeModule('sale');
    CModule::IncludeModule('iblock');
    if (!empty($_REQUEST['custom_action'])) {
        $action = htmlspecialchars($_REQUEST['custom_action']);
    }
    if (!empty($_REQUEST['id'])) {
        $id = htmlspecialchars(intval($_REQUEST['id']));
    }
    if (!empty($_REQUEST['quantity'])) {
        $quantity = htmlspecialchars(intval($_REQUEST['quantity']));
    }

    if ($action == 'ADD2BASKET' && !empty($id)) {
        if (Add2BasketByProductID(
          $id,
          $quantity,
          false,
          array()
        )) {
          ob_start();
            $APPLICATION->IncludeFile(SITE_DIR. 'include/small_basket.php');
            $small_basket = ob_get_contents();
          ob_clean();
          
          echo json_encode(array('small_basket' => $small_basket, 'success' => 'Товар добавлен в корзину'));
        } else {
          echo json_encode(array('error' => 'Товар не удалось добавить в корзину!'));
        }
    }

    if ($action == 'DELETE2BASKET' && !empty($id)) {
        if (CSaleBasket::Delete($id)) {
          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/small_basket.php');
              $small_basket = ob_get_contents();
          ob_clean();

          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/big_basket.php');
              $big_basket = ob_get_contents();
          ob_clean();

          echo json_encode(array('small_basket' => $small_basket, 'big_basket' => $big_basket,'success' => 'Товар успешно удален из корзины!'));
        } else {
          echo json_encode(array('error' => 'Товар не удалось удалить из корзины!'));
        }
    }

    if ($action == 'UPDATE2BASKET' && !empty($id)) {
        if (CSaleBasket::Update(
            $id,
            array(
              "QUANTITY" => $quantity
            )
          )) {
          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/small_basket.php');
              $small_basket = ob_get_contents();
          ob_clean();

          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/big_basket.php');
              $big_basket = ob_get_contents();
          ob_clean();

          echo json_encode(array('small_basket' => $small_basket, 'big_basket' => $big_basket,'success' => 'Товары в корзине успешно обновлены!'));
        } else {
          echo json_encode(array('error' => 'Товары в корзине не удалось обновить!'));
        }
    }
    /*
    if ($action == 'ENTER2COUPON') {
        $oldUse = false;
        if ($coupon)
        {
          $coupon = trim((string)$coupon);
          if ($coupon != '')
          {
            $validCoupon = DiscountCouponsManager::add($coupon);
          }
          else
          {
            $oldUse = true;
          }
        }
        if ($oldUse)
        {
          if (!isset($validCoupon) || $validCoupon === false)
          {
            DiscountCouponsManager::clear(true);
          }
        }

        ob_start();
            $APPLICATION->IncludeFile(SITE_DIR. 'include/small_basket.php');
            $small_basket = ob_get_contents();
        ob_clean();

        ob_start();
            $APPLICATION->IncludeFile(SITE_DIR. 'include/big_basket.php');
            $big_basket = ob_get_contents();
        ob_clean();

        if ($validCoupon) {
          $success = 'Купон успешно добавлен и является применяемым!';
        } else {
          $success = 'Купон успешно добавлен и не является применяемым!';
        }
        echo json_encode(array('small_basket' => $small_basket, 'big_basket' => $big_basket, 'success' => $success));
    }

    if ($action == 'DELETE2COUPON') {
        $res = DiscountCouponsManager::delete($coupon);
        if ($res) {
          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/small_basket.php');
              $small_basket = ob_get_contents();
          ob_clean();

          ob_start();
              $APPLICATION->IncludeFile(SITE_DIR. 'include/big_basket.php');
              $big_basket = ob_get_contents();
          ob_clean();

          echo json_encode(array('small_basket' => $small_basket, 'big_basket' => $big_basket, 'success' => 'Купон удален!'));
        } else {
          echo json_encode(array('error' => 'Купон удалить не удалось!'));
        }
    }
    */
