
// Demonstrating the JTextField class.
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;



public class TextFieldTest extends JFrame {
	
	   private JTextField textField1, textField2, textField3;
	   private JPasswordField passwordField;

	   // set up GUI
	   public TextFieldTest()
	   {
	      super( "Testing JTextField and JPasswordField" );

	      Container container = getContentPane();
	      container.setLayout( new FlowLayout() );

	      // construct textfield with default sizing
	      textField1 = new JTextField( 10 );
	      container.add( textField1 );

	      // construct textfield with default text
	      textField2 = new JTextField( "Enter text here" );
	      container.add( textField2 );

	      // construct textfield with default text,
	      // 20 visible elements and no event handler
	      textField3 = new JTextField( "Uneditable text field", 20 );
	      textField3.setEditable( false );
	      container.add( textField3 );

	      // construct passwordfield with default text
	      passwordField = new JPasswordField( "Hidden text" );
	      container.add( passwordField );

	      setSize( 325, 100 );
	      setVisible( true );

	   } // end constructor TextFieldTest

	   public static void main( String args[] )
	   { 
	      TextFieldTest application = new TextFieldTest();
	      application.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
	   }


}
