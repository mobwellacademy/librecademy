"use strict";

describe("autoFormat option:", function() {

  beforeEach(function() {
    intlSetup(true);
  });

  afterEach(function() {
    getParentElement().remove();
    input.intlTelInput("destroy");
    input = null;
  });



  describe("input containing national number, init plugin with autoFormat and nationalMode enabled", function() {
  
    beforeEach(function() {
      input = $("<input value='7024181234 A'>");
      // must be in DOM for focus/keys to work
      input.appendTo($("body"));

      input.intlTelInput({
        autoFormat: true,
        nationalMode: true
      });
    });

    it("formats the number according to the defaultCountry", function() {
      expect(getInputVal()).toEqual("(702) 418-1234");
    });
  
  });



  describe("input with maxlength=6, init plugin with autoFormat enabled", function() {
  
    beforeEach(function() {
      input = $("<input value='+1 70' maxlength='6'>");
      // must be in DOM for focus/keys to work
      input.appendTo($("body"));

      input.intlTelInput({
        autoFormat: true
      });
    });

    it("adding a 6th char doesnt add the normal formatting suffix", function() {
      triggerKeyOnInput("2");
      expect(getInputVal()).toEqual("+1 702");
    });

    it("typing a 7th char doesnt do anything", function() {
      triggerKeyOnInput("2");
      triggerKeyOnInput("4");
      expect(getInputVal()).toEqual("+1 702");
    });

    it("focusing input (at the maximum length) with cursor in middle, typing char doesnt do anything", function() {
      triggerKeyOnInput("2");
      input.focus();
      input[0].setSelectionRange(4, 4);
      triggerKeyOnInput("4");
      expect(getInputVal()).toEqual("+1 702");
    });
  
  });




  describe("input with no initial value, init plugin with autoFormat enabled", function() {
  
    beforeEach(function() {
      input = $("<input>");
      // must be in DOM for focus/keys to work
      input.appendTo($("body"));

      input.intlTelInput({
        autoFormat: true
      });
    });

    it("focusing the input adds the dial code and format suffix", function() {
      input.focus();
      expect(getInputVal()).toEqual("+1 ");
    });

    it("replacing the val with a number (faking a paste event) re-adds the plus", function() {
      input.val("1");
      triggerKeyOnInput("CTRL");
      expect(getInputVal()).toEqual("+1");
    });

    it("replacing the val with an alpha (faking a paste event) re-adds the plus and removes the alpha", function() {
      input.val("a");
      triggerKeyOnInput("CTRL");
      expect(getInputVal()).toEqual("+");
    });
  
  });




  describe("input with initial value", function() {

    var unformattedNumber = "+1 702 418 1234 B",
      formattedNumber = "+1 702-418-1234";

    beforeEach(function() {
      input = $("<input value='" + unformattedNumber + "'>");
      // must be in DOM for focus/keys to work
      input.appendTo($("body"));
    });


    describe("init plugin with autoFormat disabled", function() {
    
      beforeEach(function() {
        input.intlTelInput({
          autoFormat: false
        });
      });

      it("initialising the plugin leaves the number the same", function() {
        expect(input.val()).toEqual(unformattedNumber);
      });

      it("triggering alpha key at end of input adds the alpha char and leaves the rest", function() {
        // updating the input value will be silent (no events triggered)
        input.val(unformattedNumber + "A");
        triggerKeyOnInput("A");

        expect(input.val()).toEqual(unformattedNumber + "A");
      });
    
    });


    describe("init plugin with autoFormat enabled", function() {
    
      beforeEach(function() {
        input.intlTelInput({
          autoFormat: true
        });
      });

      it("initialising the plugin formats the number", function() {
        expect(input.val()).toEqual(formattedNumber);
      });

      it("triggering alpha key at end of input does not add the alpha char and formats the rest", function() {
        // we dont have to manually alter the input val as when autoFormat is enabled this is all done in the event handler
        putCursorAtEnd();
        triggerKeyOnInput("A");
        expect(input.val()).toEqual(formattedNumber);
      });




      it("adding a digit automatically adds any formatting suffix", function() {
        input.val("+");
        putCursorAtEnd();
        // this is handled by the keypress handler, and so will insert the char for you
        triggerKeyOnInput("1");
        expect(input.val()).toEqual("+1 ");
      });

      it("deleting a digit automatically removes any remaining formatting suffix", function() {
        // backspace key event is handled by the keyup handler, which expects the input val to already be updated, so instead of "+1 7", I have already removed the 7
        input.val("+1 ");
        putCursorAtEnd();
        triggerKeyOnInput("BACKSPACE");
        expect(input.val()).toEqual("+1");
      });




      describe("after deleting a char and it removing any format suffix", function() {
      
        beforeEach(function() {
          // e.g. imagine it was "+1 7" and we deleted the 7 and it auto-removed the rest
          input.val("+1");
          putCursorAtEnd();
        });
      
        it("hitting a number will re-add the formatting in between", function() {
          // this is handled by the keypress handler, and so will insert the char for you
          triggerKeyOnInput("7");
          expect(input.val()).toEqual("+1 7");
        });

        it("hitting any non-number char (e.g. a space) will re-add the formatting suffix", function() {
          // this is handled by the keypress handler, and so will insert the char for you
          triggerKeyOnInput(" ");
          expect(input.val()).toEqual("+1 ");
          // and move the cursor to the end
          expect(input[0].selectionStart).toEqual(input.val().length);
        });

      });



      describe("selecting some chars", function() {
      
        var cursorStart = 3,
          cursorEnd = 6;

        beforeEach(function() {
          // formatted number is "+1 702-418-1234" so this will be "702"
          selectInputChars(cursorStart, cursorEnd);
        });

        it("hitting a non-number char doesn't do anything", function() {
          triggerKeyOnInput(" ");
          expect(input.val()).toEqual(formattedNumber);
          // check selection remains
          expect(input[0].selectionStart).toEqual(cursorStart);
          expect(input[0].selectionEnd).toEqual(cursorEnd);
        });

        it("hitting a number char will replace the selection, reformat, and put the cursor in the right place", function() {
          triggerKeyOnInput("9");
          expect(input.val()).toEqual("+1 941-812-34");
          // cursor
          expect(input[0].selectionStart).toEqual(cursorStart+1);
        });
      
      });
    
    });

  });

});
