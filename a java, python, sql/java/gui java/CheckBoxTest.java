
// Creating JCheckBox buttons.
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;



public class CheckBoxTest extends JFrame {
	
	   private JCheckBox bold, italic;

	   // set up GUI
	   public CheckBoxTest()
	   {
	      super( "JCheckBox Test" );

	      // get content pane and set its layout
	      Container container = getContentPane();
	      container.setLayout( new FlowLayout() );

	      // create checkbox objects
	      bold = new JCheckBox( "Bold" );
	      container.add( bold );     

	      italic = new JCheckBox( "Italic" );
	      container.add( italic );

	      setSize( 275, 100 );
	      setVisible( true );

	   } // end CheckBoxText constructor

	   public static void main( String args[] )
	   { 
	      CheckBoxTest application = new CheckBoxTest();
	      application.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
	   }


}
