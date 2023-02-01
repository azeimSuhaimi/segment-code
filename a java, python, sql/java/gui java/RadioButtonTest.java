
// Creating radio buttons using ButtonGroup and JRadioButton.
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;


public class RadioButtonTest extends JFrame {
	
	  private JRadioButton plainButton, boldButton, italicButton, 
      boldItalicButton;

   // create GUI and fonts
   public RadioButtonTest()
   {
      super( "RadioButton Test" );

      // get content pane and set its layout
      Container container = getContentPane();
      container.setLayout( new FlowLayout() );

      // create radio buttons
      plainButton = new JRadioButton( "Plain", true );
      container.add( plainButton );

      boldButton = new JRadioButton( "Bold", false );
      container.add( boldButton );

      italicButton = new JRadioButton( "Italic", false );
      container.add( italicButton );

      boldItalicButton = new JRadioButton( "Bold/Italic", false );
      container.add( boldItalicButton );

      setSize( 300, 100 );
      setVisible( true );

   } // end RadioButtonTest constructor

   public static void main( String args[] )
   {
      RadioButtonTest application = new RadioButtonTest();
      application.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
   } 


}
