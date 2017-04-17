		</div>
      <div class="clear"></div>
	</section>
    <footer class="footer">
      <div class="in-footer">
        <div class="left-part">
          <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/copyrights.php"), false);
          ?>
        </div>
        <div class="right-part">
          <?
            $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/footer/contacts.php"), false);
          ?>
        </div>
      </div>
      <div class="footer-shadow"></div>
    </footer>
  </div>
</body>
</html>